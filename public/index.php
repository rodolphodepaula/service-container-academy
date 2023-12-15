<?php

use Academy\Servicecontainer\Services\Checkout;
require __DIR__.'/../vendor/autoload.php';

$service = new Checkout('rodolpho@appcoder.com.br', 456);
echo $service->handle();