<?php

namespace App\Services\Order;

use App\Models\ticket;
use App\Models\User;
use Cache;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Psr\SimpleCache\InvalidArgumentException;

class CartService
{
    private ?string $customKey = null;

    /**
     * @var array|Application|Request|mixed|string|null
     */
    private mixed $request;

    public function __construct()
    {
        $this->request = request();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function copyCart($cartKey)
    {
        if ($this->getUser()) {
            $this->setCartKey($cartKey);
            $cart = $this->getCurrentCart($cartKey);
            $this->setCartKey(null);
            $this->updateCurrentCart($cart);
            $this->cache()->forget($cartKey);
        }
    }

    /**
     * @param  ?string $customKey
     * @return $this
     */
    public function setCartKey(?string $customKey = null): static
    {
        $this->customKey = $customKey;

        return $this;
    }

    /**
     * @param int $productId
     * @param float $quantity
     *
     * @throws InvalidArgumentException
     */
    public function addItem(int $productId, float $quantity)
    {
        $this->updateCurrentCart($this->getCurrentCart()->put($productId, [
            'product_id' => $productId,
            'quantity' => $quantity,
        ]));
    }

    /**
     * @param string|null $customKey
     * @return string
     */
    public function getCurrentCartKey(?string $customKey = null): string
    {
        if (!empty($this->customKey)) {
            return $this->customKey;
        }

        if ($this->getUser()) {
            return 'cart_' . $this->getUser()->id;
        }

        if ($customKey) {
            return $customKey;
        }

        return 'cart_' . uniqid();
    }

    /**
     * @param string|null $customCrtKey
     * @return object|null
     *
     * @throws InvalidArgumentException
     */
    public function getPublicCart(?string $customCrtKey = null): ?object
    {
        $cart = $this->getCurrentCart($customCrtKey);

        if ($cart->isEmpty()) {
            return null;
        }

        $cart = self::makeCart($cart);

        $cartData = arrayToObject([
            'price' => 0,
            'tax_price' => 0,
            'discount_price' => 0,
            'total_price' => 0,
        ]);

        $cartData->items = $cart;

        return $cartData;
    }

    /**
     * @param string|null $customCrtKey
     * @return Collection
     *
     * @throws InvalidArgumentException
     */
    private function getCurrentCart(?string $customCrtKey = null): Collection
    {
        return $this->cache()->get($this->getCurrentCartKey($customCrtKey), collect([]));
    }

    /**
     * @param int $productId
     *
     * @throws InvalidArgumentException
     */
    public function removeItem(int $productId)
    {
        $cart = $this->getCurrentCart();
        $cart->offsetUnset($productId);

        $this->updateCurrentCart($cart);
    }

    public function removeCart()
    {
        $this->cache()->forget($this->getCurrentCartKey());
    }

    public function isEmpty(): bool
    {
        return $this->getCurrentCart()->isEmpty();
    }

    /**
     * @param Collection $cart
     * @return Collection
     */
    public static function makeCart(Collection $cart): Collection
    {
        return $cart->map(fn($cart) => arrayToObject($cart));

//        $products = ticket::query()->whereIn('id', $cart->pluck('product_id'))->get();
//
//        return $cart->map(function ($cart) use ($products) {
//            $product = $products->where('id', $cart->product_id)->first();
//            if ($product) {
//                $product->quantity = $cart->quantity;
//
//                return $product;
//            }
//
//            return null;
//        })->filter();
    }

    /**
     * @return Repository
     */
    private function cache(): Repository
    {
        return Cache::driver('cache_order');
    }

    /**
     * @return Authenticatable|User|null
     */
    private function getUser(): Authenticatable|User|null
    {
        return auth()->user();
    }

    /**
     * @param Collection $cart
     */
    private function updateCurrentCart(Collection $cart)
    {
        $this->cache()->put($this->getCurrentCartKey(), $cart, 3600);
    }
}
