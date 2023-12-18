<?php

use Academy\Servicecontainer\Providers\CieloPaymentProvider;
use Academy\Servicecontainer\Providers\PaddlePaymentProvider;
use Academy\Servicecontainer\Providers\StripePaymentProvider;
use Academy\Servicecontainer\Services\Checkout;
use Academy\Servicecontainer\Utils\Http;

require __DIR__.'/../vendor/autoload.php';

$service = new Checkout('rodolpho@appcoder.com.br', 456);
echo $service->handle(new PaddlePaymentProvider(new Http));