<?php 

namespace Tokk\Paypal\Request;

use Tokk\Paypal\Parameters\Parameters;

interface Request
{
    public function prepare(Parameters $parameters);
    
    public function get();
}