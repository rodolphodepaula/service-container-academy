<?php
namespace Academy\Servicecontainer\Providers;

use Academy\Servicecontainer\Providers\interfaces\PaymentProviderContract;
use Academy\Servicecontainer\Utils\Http;

class CieloPaymentProvider implements PaymentProviderContract
{
    //Injeção de Dependência Http
    public function __construct(Http $clientHttp)
    {}

    public function charge(string $email, int $amount): string
    {
        return "We successfully charge BRL {$email} from {$amount}";
    }
}