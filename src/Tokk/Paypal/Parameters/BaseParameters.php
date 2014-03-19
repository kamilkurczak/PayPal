<?php 

namespace Tokk\Paypal\Parameters;

abstract class BaseParameters implements Parameters
{
    protected $parameters = array();
    
    public function __construct()
    {
        $parameters['apiUser'] = array('parameter' => 'USER', 'value' => null);
        $parameters['apiPassword'] = array('parameter' => 'PWD', 'value' => null);
        $parameters['apiSignature'] = array('parameter' => 'SIGNATURE', 'value' => null);
        $parameters['apiVersion'] = array('parameter' => 'VERSION', 'value' => null);
    }
}