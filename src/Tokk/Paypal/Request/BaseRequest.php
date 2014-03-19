<?php

namespace Tokk\Paypal\Request;

use Tokk\Paypal\Parameters\Parameters;

abstract class BaseRequest implements Request
{
    protected $content;
    
    public function prepare(Parameters $parameters)
    {
        $loopIndex = 0;
        foreach ($parameters->toArray() as $key => $parameter) {
            if ($parameter['value'] === null) {
                continue;
            }
            $this->addParameter($parameter, $loopIndex);
            $loopIndex++;
        }
    }
    
    protected function addParameter($parameter, $loopIndex)
    {
        if ($loopIndex != 0) {
            $this->content .= "&";
        }
        $this->content .= "{$parameter['name']}={$parameter['value']}";
    }
    
    public function get()
    {
        return $this->content;
    }
}