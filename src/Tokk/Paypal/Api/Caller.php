<?php 

namespace Tokk\Paypal\Api;

use Tokk\Paypal\Request\Request;

class Caller implements Api
{
    protected $curl;
    
    protected $response;
    
    protected $errors = array();
    
    protected $valid;
    
    public function call(Request $request, $paypalEndpoint)
    {
        $this->init($request, $paypalEndpoint);
        $this->execute();
        $this->valid = $this->validate();
        $this->close();
        
        return $this->valid;
    }
    
    private function init(Request $request, $paypalEndpoint)
    {
        $this->curl = curl_init();
    
        curl_setopt($this->curl, CURLOPT_URL, $paypalEndpoint);
        curl_setopt($this->curl, CURLOPT_VERBOSE, 1);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $request->get());
    }
    
    private function execute()
    {
        $response = curl_exec($this->curl);
        parse_str($response, $this->response);
    }
    
    private function close()
    {
        curl_close($this->curl);
    }
    
    private function validate()
    {
        if (curl_errno($this->curl)) {
            $this->errors = curl_error($this->curl);
            return false;
        }
    
        return true;
    }
    
    public function getResponse()
    {
        return $this->response;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}