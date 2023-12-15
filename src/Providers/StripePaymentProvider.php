<?php
namespace Academy\Servicecontainer\Providers;


use Academy\Servicecontainer\Utils\Http;

class StripePaymentProvider
{
    //Injeção de Dependência Http
    public function __construct(Http $clientHttp)
    {}

    public function charge(string $email, int $amount)
    {
        return "We successfully charge USD {$email} from {$amount}";
    }
}