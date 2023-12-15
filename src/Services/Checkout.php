<?php

namespace Academy\Servicecontainer\Services;

use Academy\Servicecontainer\Providers\StripePaymentProvider;
use Academy\Servicecontainer\Utils\Http;

class Checkout
{
    public function __construct(private string $email, private int $amount)
    { }

    public function handle()
    {
        $stripeProvider = new StripePaymentProvider(new Http);

        return $stripeProvider->charge($this->email, $this->amount);
    }
}
