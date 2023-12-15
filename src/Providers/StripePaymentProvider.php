<?php
namespace Academy\Servicecontainer\providers;



class StripePaymentProvider
{
    public function charge(string $email, int $amount)
    {
        return "We successfully charge USD {$amount} from {$email}";
    }
}