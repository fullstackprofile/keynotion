<?php

namespace App\Services\Order;

use App\Models\Coupon;
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
     * @param int $count
     * @param string $price
     *
     * @throws InvalidArgumentException
     */
    public function addItem(int $productId, int $count, string $price): void
    {
        $cart = $this->getCurrentCart();
        /** @var Collection $cartData */
        $cartData = $cart->get($this->cartItemKey(), collect());

        $cartData->put($productId, [
            'ticket_id' => $productId,
            'price' => $price,
            'count' => $count,
        ]);
        $cart->put($this->cartItemKey(), $cartData);

        $this->updateCurrentCart($cart);
    }

    /**
     * @param Coupon $coupon
     * @return void
     * @throws InvalidArgumentException
     */
    public function setCoupon(Coupon $coupon): void
    {

        $cart = $this->getCurrentCart();
        /** @var Collection $coupon */

        $cart->put('coupon', $coupon);

        $this->updateCurrentCart($cart);
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

        /** @var Coupon $coupon */
        $coupon = $cart->get('coupon');
        $discount = 0;
        if ($coupon) {
        }

        $cartItems = self::makeCart($cart->get($this->cartItemKey(), collect()));
        $subTotal = 0;
        $vat = 0;

        $cartItems->each(function ($ticket) use (&$subTotal) {
            $subTotal += $ticket->price * $ticket->count;
        });

        $total = ($subTotal + $vat);

        $discountTotal = 0;

        if ($coupon) {
            if ($coupon->percent_amount === '%') {
                $discountTotal = ($total * $coupon->discount) / 100;
            } else {
                $discountTotal = $coupon->discount;
            }
            $total = ($discountTotal > $total || $discountTotal < 0) ? 0 : $total - $discountTotal;
        }

        $cartData = arrayToObject([
            'discount_total' => $discountTotal,
            'subtotal' => $subTotal,
            'vat' => $vat,
            'total' => $total,
        ]);

        $cartData->items = $cartItems;
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
        $cartData = $cart->get($this->cartItemKey(), collect());

        $cartData->offsetUnset($productId);
        $cart->put($this->cartItemKey(), $cartData);

        $this->updateCurrentCart($cart);
    }

    public function removeCart(): void
    {
        $this->cache()->forget($this->getCurrentCartKey());
    }

    private function cartItemKey(): string
    {
        return 'cart_item';
    }

    /**
     * @return bool
     * @throws InvalidArgumentException
     */
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

        $tickets = ticket::query()->whereIn('id', $cart->pluck('ticket_id'))->get();

        return $cart->map(function ($cart) use ($tickets) {
            $ticket = $tickets->where('id', $cart->ticket_id)->first();
            if ($ticket) {
                $ticket->count = $cart->count;
                return $ticket;
            }
            return null;
        })->filter();
    }

    /**
     * @return Repository
     */
    private function cache(): Repository
    {
        return Cache::store('database');
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
