<?php

namespace Tokk\Paypal\Request;

abstract class BaseRequest implements Request
{
    protected $content;
    
    public function prepare($parameters = array())
    {
        $this->content .=
            "USER={$parameters['apiUser']}" .
            "&PWD={$parameters['apiPassword']}" .
            "&SIGNATURE={$parameters['apiSignature']}" .
            "&VERSION={$parameters['apiVersion']}";
    }
    
    public function get()
    {
        return $this->content;
    }
}