<?php 

namespace Tokk\Paypal\Api;

use Tokk\Paypal\Request\Request;

interface Api
{
    public function call(Request $request, $paypalEndpoint);
        
    public function getResponse();
    
    public function getErrors();
}