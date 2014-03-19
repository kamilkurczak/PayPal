<?php 

namespace Tokk\Paypal;

use Tokk\Paypal\Api\Api;
use Tokk\Paypal\Request\Request;

class PayPal
{
    protected $api;
    
    protected $apiEndPoint;
    
    protected $response;
    
    public function __construct(Api $api, $apiEndPoint)
    {
        $this->api = $api;
        $this->apiEndPoint = $apiEndPoint;
    }
    
    public function run(Request $request)
    {
        if (!$this->api->call($request, $this->apiEndPoint)) {
            return false;
        }
    
        $this->response = $this->api->getResponse();
        return $this->validate();
    }
    
    protected function validate()
    {
        if (strtoupper($this->response['ACK']) != "SUCCESS" && strtoupper($this->response['ACK']) != "SUCCESSWITHWARNING") {
            $this->errors = $this->response['L_LONGMESSAGE0'];
            return false;
        }
    
        return true;
    }
    
    public function getResponse()
    {
        return $this->response;
    }
}