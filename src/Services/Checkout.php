<?php

namespace Academy\Servicecontainer\Services;

use Academy\Servicecontainer\Providers\interfaces\PaymentProviderContract;

class Checkout
{
    public function __construct(private string $email, private int $amount)
    { }

    public function handle(PaymentProviderContract $paymenProvider)
    {
        return $paymenProvider->charge($this->email, $this->amount);
    }
}
