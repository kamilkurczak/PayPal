<?php 

namespace Tokk\Paypal\Parameters;

interface Parameters
{
    public function set($key, $value);
    
    public function get();
    
    public function toArray();
}