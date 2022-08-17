<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\BaseController;
use App\Http\Requests\API\Order\OrderCheckoutStoreRequest;
use App\Services\Order\CheckoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\HigherOrderWhenProxy;

class CheckoutController extends BaseController
{
    /**
     * @param  OrderCheckoutStoreRequest  $request
     * @return JsonResponse|Collection|HigherOrderWhenProxy|mixed|mixed[]
     */
    public function store(OrderCheckoutStoreRequest $request)
    {
        $checkout = (new CheckoutService())->make($request, $this->getUser())->pay();
        return $checkout->redirect();
    }
}
