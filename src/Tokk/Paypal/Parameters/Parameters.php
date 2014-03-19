<?php 

namespace Tokk\Paypal\Parameters;

interface Parameters
{
    public function addValues($values = array());
    
    public function set($parameter, $value);
    
    public function toArray();
}