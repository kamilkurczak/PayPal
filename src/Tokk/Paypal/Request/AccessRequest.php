<?php

namespace Tokk\Paypal\Request;

class AccessRequest extends BaseRequest
{
    public function prepare($parameters = array())
    {
        parent::prepare($parameters);
        $this->prepareItems($parameters['items']);
        
        $this->request .=
            "&METHOD=SetExpressCheckout" .
            "&PAYMENTREQUEST_0_PAYMENTACTION={$this->apiPaymentAction}" .
            "&PAYMENTREQUEST_0_CURRENCYCODE={$this->apiCurrencyCode}" .
            
            "&RETURNURL={$this->returnUrl}" .
            "&CANCELURL={$this->cancelUrl}" .
            
            "&noshipping=1" .
            
            "&HDRIMG={$this->logoUrl}" .
            "&LANDINGPAGE=Billing" .
            "&CARTBORDERCOLOR=92c46a" .
            
            "&METHOD=SetCustomerBillingAgreement" .
            "&BILLINGTYPE=MerchantInitiatedBilling" .
            "&L_BILLINGAGREEMENTDESCRIPTION0={$this->agreementDescription}" .
            "&PAYMENTTYPE=Any" .
            "&BILLINGAGREEMENTCUSTOM={$this->agreementCustom}" .
            
            "&PAYMENTREQUEST_0_ITEMAMT={$this->totalAmount}" .
            "&PAYMENTREQUEST_0_AMT={$this->totalAmount}";
    }
    
    protected function prepareItems($items = array())
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
    }
}