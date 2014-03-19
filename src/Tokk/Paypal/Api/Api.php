<?php 

namespace Tokk\Paypal\Api;

use Tokk\Paypal\Request\Request;

interface Api
{
    public function call(Request $request, $paypalEndpoint);
    
    private function init(Request $request, $paypalEndpoint);
    
    private function execute();
    
    private function close();
    
    private function validate();
    
    public function getResponse();
    
    public function getErrors();
}