<?php

use Academy\Servicecontainer\Base\Container;
use Academy\Servicecontainer\Providers\CieloPaymentProvider;
use Academy\Servicecontainer\Providers\interfaces\PaymentProviderContract;
use Academy\Servicecontainer\Providers\PaddlePaymentProvider;
use Academy\Servicecontainer\Providers\StripePaymentProvider;
use Academy\Servicecontainer\Services\Checkout;
use Academy\Servicecontainer\Utils\Http;

require __DIR__.'/../vendor/autoload.php';

$container = new Container;

$container->register(PaymentProviderContract::class, StripePaymentProvider::class);

$paymentProvider = $container->get(PaymentProviderContract::class);

$service = new Checkout('rodolpho@appcoder.com.br', 456);

$cieloProvider = $container->get(PaymentProviderContract::class);

echo $service->handle($paymentProvider);