<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Order\OrderCartIndexRequest;
use App\Http\Requests\Api\Order\OrderCartUpdateRequest;
use App\Http\Resources\Cart\CartResource;
use App\Models\Coupon;
use Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\HigherOrderWhenProxy;
use Illuminate\Validation\ValidationException;
use Psr\SimpleCache\InvalidArgumentException;

class CartController extends BaseController
{
    /**
     * @param OrderCartIndexRequest $request
     * @return JsonResponse|Collection|HigherOrderWhenProxy|mixed|mixed[]
     */
    public function index(OrderCartIndexRequest $request): mixed
    {
        return $this->getCart($request);
    }

    /**
     * @param OrderCartUpdateRequest $request
     * @return JsonResponse|Collection|HigherOrderWhenProxy|mixed
     *
     * @throws InvalidArgumentException
     */
    public function store(OrderCartUpdateRequest $request): mixed
    {
        Cart::setCartKey($request->cart_id)->addItem($request->ticket_id, $request->count, $request->price);
        return $this->getCart($request);
    }

    /**
     * @param OrderCartIndexRequest $request
     * @param $productId
     * @return mixed
     * @throws InvalidArgumentException
     */

    public function destroy(OrderCartIndexRequest $request, $productId): mixed
    {
        Cart::setCartKey($request->cart_id)->removeItem((int)$productId);

        return $this->getCart($request);
    }

    /**
     * @param OrderCartIndexRequest $request
     * @return mixed
     */

    public function destroyCart(OrderCartIndexRequest $request): mixed
    {
        Cart::setCartKey($request->cart_id)->removeCart();
        return $this->getCart($request);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws InvalidArgumentException|ValidationException
     */
    public function coupon(Request $request): mixed
    {
        $this->validate($request, [
            'code' => 'required|exists:coupons,code'
        ]);

        $now = date('Y-m-d H:i:s');

        $coupon = Coupon::where('code',$request->code)->first();
        if ($coupon->expiration_date > $now){
            Cart::setCartKey($request->cart_id)->setCoupon($coupon);
            return $this->getCart($request);
        }
        else{
            return response()->json(['message' =>' Coupon expired']);
        }

    }

    private function getCart(Request $request)
    {
        $cart = Cart::getPublicCart($request->cart_id);
        return $this->render($cart ? new CartResource($cart) : []);
    }
}
