<?php

namespace Tokk\Paypal\Request;

use Tokk\Paypal\Parameters\AccessParameters;

class AccessRequest extends BaseRequest
{
    /*protected function prepareItems($items = array())
    {
        foreach ($items as $key => $item) {
            $this->totalAmount += $item['amount'];
            $name = urlencode($item['name']);
            $description = urlencode($item['description']);
        
            $this->request .=
                "&L_PAYMENTREQUEST_0_AMT{$key}={$item['amount']}" .
                "&L_PAYMENTREQUEST_0_NAME{$key}={$name}" .
                "&L_PAYMENTREQUEST_0_QTY{$key}=1" .
                "&L_PAYMENTREQUEST_0_DESC{$key}={$description}";
        }
    }*/
}