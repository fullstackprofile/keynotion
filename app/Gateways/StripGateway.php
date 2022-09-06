<?php

namespace App\Gateways;

use Illuminate\Support\Arr;
use Laravel\Cashier\Exceptions\IncompletePayment;

/**
 * @property $options
 */
class StripGateway extends BaseGateway
{
    protected array $options = [];

    protected ?string $redirectUrl;

    public function pay(): void
    {
        $this->setOptions([
            'statement_descriptor' => sprintf('Order ID : %d', $this->order->id),
            'metadata' => ['order_id' => $this->order->id],
            'return_url' => $this->getThankYouPage(),
        ]);

        try {
            $this->user->charge(
                $this->order->total * 100,
                $this->paymentCard,
                $this->options
            );
        } catch (IncompletePayment $exception) {
            $this->redirectUrl = $this->get3dsUrl($exception);
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    /**
     * @param  array  $options
     * @return $this
     */
    public function setOptions(array $options = []): self
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    public function redirectAfterPay(): mixed
    {
        return ! empty($this->redirectUrl) ? $this->redirectUrl : false;
    }

    /**
     * @param  IncompletePayment  $incompletePaymentException
     * @return string|null
     */
    private function get3dsUrl(IncompletePayment $incompletePaymentException): ?string
    {
        $url = Arr::get(
            $incompletePaymentException->payment->toArray(),
            'next_action.use_stripe_sdk.stripe_js'
        );
        if (empty($url)) {
            $url = Arr::get(
                $incompletePaymentException->payment->toArray(),
                'next_action.redirect_to_url.url'
            );
        }

        return $url;
    }
}
