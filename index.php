<?php 

$loader = require_once __DIR__.'/vendor/autoload.php';

use Tokk\Paypal\PayPal;
use Tokk\Paypal\Api\Caller;
use Tokk\Paypal\Request\RequestFactory;

$apiEndPoint = 'https://api-3t.sandbox.paypal.com/nvp';
$values = array(
    'apiUser' => 'user@user.com',
    'apiPassword' => 'test',
    'apiSignature' => 'test',
    'apiVersion' => '1.0',
    'method' => 'test',
    'paymentAction' => 'test',
    'currencyCode' => 'EUR',
    'returnUrl' => 'test',
    'cancelUrl' => 'test',
    'itemAmount' => '2',
    'totalAmount' => '2'
);

$request = RequestFactory::make('access', $values);

$paypal = new PayPal(new Caller(), $apiEndPoint);
$paypal->run($request);