<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Order\OrderCartIndexRequest;
use App\Http\Requests\Api\Order\OrderCartUpdateRequest;
use App\Http\Resources\Cart\CartResource;
use Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\HigherOrderWhenProxy;
use Psr\SimpleCache\InvalidArgumentException;

class CartController extends BaseController
{
    /**
     * @param  OrderCartIndexRequest  $request
     * @return JsonResponse|Collection|HigherOrderWhenProxy|mixed|mixed[]
     */
    public function index(OrderCartIndexRequest $request): mixed
    {
        return $this->getCart($request->cart_id);
    }

    /**
     * @param  OrderCartUpdateRequest  $request
     * @return JsonResponse|Collection|HigherOrderWhenProxy|mixed
     *
     * @throws InvalidArgumentException
     */
    public function store(OrderCartUpdateRequest $request): mixed
    {
        Cart::setCartKey($request->cart_id)->addItem($request->product_id, $request->quantity);

        return $this->getCart($request->cart_id);
    }

    /**
     * @param  OrderCartIndexRequest  $request
     * @param $productId
     * @return mixed
     */
    public function destroy(OrderCartIndexRequest $request, $productId): mixed
    {
        Cart::removeItem((int) $productId);

        return $this->getCart($request->cart_id);
    }

    private function getCart(string $cartId)
    {
        $cart = Cart::getPublicCart($cartId);

        return $this->render($cart ? new CartResource($cart) : []);
    }
}
