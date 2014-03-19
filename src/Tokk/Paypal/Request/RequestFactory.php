<?php

namespace Tokk\Paypal\Request;

class RequestFactory implements Factory
{
    protected static $classess = array(
        'access' => array(
            'class' => 'Tokk\Paypal\Request\AccessRequest',
            'parameters' => 'Tokk\Paypal\Parameters\AccessParameters'
        ),
        'expressCheckout' => array(
            'class' => 'Tokk\Paypal\Request\ExpressCheckoutRequest',
            'parameters' => 'Tokk\Paypal\Parameters\BaseParameters'
        ),
        'referenceCheckout' => array(
            'class' => 'Tokk\Paypal\Request\ReferenceCheckoutRequest',
            'parameters' => 'Tokk\Paypal\Parameters\BaseParameters'
        )
    );

    public static function make($type, $values = array(), $requestClassess = array())
    {
        self::$classess = array_merge(self::$classess, $requestClassess);

        if (isset(self::$classess[$type])) {
            $parameters = new self::$classess[$type]['parameters']();
            $parameters->addValues($values);
            $request = new self::$classess[$type]['class']();
            $request->prepare($parameters);
            return $request;
        } else {
            throw new \InvalidArgumentException('Wrong Request type');
        }
    }
}