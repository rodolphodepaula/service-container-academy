<?php

namespace Academy\Servicecontainer\Providers\interfaces;

use Academy\Servicecontainer\Utils\Http;

interface PaymentProviderContract {

    public function __construct(Http $httpClient);

    public function charge(string $email, int $amount): string;

}
