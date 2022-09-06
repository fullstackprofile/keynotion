<?php

namespace App\Traits;

use Laravel\Cashier\Billable;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Exceptions\CustomerAlreadyCreated;
use Throwable;

trait StripeTrait
{
    use Billable;

    /**
     * @throws CustomerAlreadyCreated
     */
    public function generateStripeId(): void
    {
        $this->createOrGetStripeCustomer();

        if (!$this->hasStripeId()) {
            $this->createAsStripeCustomer();
        } else {
            try {
                Cashier::stripe()->customers->retrieve($this->stripe_id);
            } catch (Throwable) {
                $this->update(['stripe_id' => null]);
                $this->createAsStripeCustomer();
            }
        }
    }

    /**
     * Get the name that should be synced to Stripe.
     *
     * @return string|null
     */
    public function stripeName()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}
