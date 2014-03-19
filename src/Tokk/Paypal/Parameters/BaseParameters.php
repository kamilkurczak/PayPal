<?php 

namespace Tokk\Paypal\Parameters;

abstract class BaseParameters implements Parameters
{
    protected $parameters = array();
    
    public function __construct()
    {
        $this->parameters['apiUser'] = array('name' => 'USER', 'value' => null, 'required' => true);
        $this->parameters['apiPassword'] = array('name' => 'PWD', 'value' => null, 'required' => true);
        $this->parameters['apiSignature'] = array('name' => 'SIGNATURE', 'value' => null, 'required' => true);
        $this->parameters['apiVersion'] = array('name' => 'VERSION', 'value' => null, 'required' => true);
        $this->parameters['method'] = array('name' => 'METHOD', 'value' => null, 'required' => true);
    }
    
    public function addValues($values = array())
    {
        foreach ($this->parameters as $parameter => $options) {
            if ($options['required'] && !isset($values[$parameter])) {
                throw new \InvalidArgumentException("Parameter {$parameter} must be defined");
            } elseif (isset($values[$parameter])) {
                $this->set($parameter, $values[$parameter]);
            }
        }
    }
    
    public function set($parameter, $value)
    {
        if (!isset($this->parameters[$parameter])) {
            throw new \InvalidArgumentException("Parameter {$parameter} not exist");
        }
        
        $this->parameters[$parameter]['value'] = $value;
    }
    
    public function toArray()
    {
        return $this->parameters;
    }
}