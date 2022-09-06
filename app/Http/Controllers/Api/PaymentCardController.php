<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\RedirectException;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\PaymentCard\StorePaymentCardRequest;
use Illuminate\Http\Response;
use Laravel\Cashier\Cashier;
use Stripe\Exception\ApiErrorException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PaymentCardController extends BaseController
{
    /**
     * @param StorePaymentCardRequest $request
     * @return Response
     */
    public function store(StorePaymentCardRequest $request): Response
    {
        try{
            if (
                ($pm = Cashier::stripe()->paymentMethods->retrieve($request->payment_method_id))
                && ($fingerprint = $pm?->card?->fingerprint)
                && $this->getUser()->paymentMethods()->filter(fn($method) => $method->card->fingerprint === $fingerprint)->first()
            ) {
                $error = 'Credential has problem';
                if ($this->getUser()->paymentMethods()->filter(fn($method) => $method->card->fingerprint === $fingerprint)->first()) {
                    $error = 'before this, you added this cart';
                }
                return $this->render(null,[
                    'error' =>  $error
                ], ResponseAlias::HTTP_BAD_REQUEST);
            }
            return $this->render();
        }catch (\Throwable $exception){
            return $this->render(null,[
                'error' =>  $exception->getMessage()
            ], ResponseAlias::HTTP_BAD_REQUEST);
        }

    }
}
