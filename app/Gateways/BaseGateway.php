<?php

namespace App\Gateways;

use App\Models\Order;
use App\Models\PaymentCard;
use App\Models\User;

abstract class BaseGateway
{
    protected User $user;

    protected mixed $paymentCard = null;

    protected ?Order $order;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $paymentCard
     * @return $this
     */
    public function setPaymentCard(mixed $paymentCard = null): static
    {
        $this->paymentCard = $paymentCard;

        return $this;
    }

    /**
     * @param Order $order
     * @return $this
     */
    public function setOrder(Order $order): static
    {
        $this->order = $order;

        return $this;
    }

    public function getThankYouPage(): string
    {
        return route('thank-you', ['order' => (string)$this->order->uuid]);
    }

    abstract public function pay(): void;

    abstract public function redirectAfterPay(): mixed;
}
