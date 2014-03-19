<?php 

namespace Tokk\Paypal\Request;

interface Request
{
    public function prepare($parameters = array());
    
    public function get();
}