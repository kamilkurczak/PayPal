<?php 

namespace Tokk\Paypal\Parameters;

class AccessParameters extends BaseParameters
{
    public function __construct()
    {
        parent::__construct();
        $this->parameters['apiUser'] = array('name' => 'USER', 'value' => null, 'required' => true);
        $this->parameters['paymentAction'] = array('name' => 'PAYMENTREQUEST_0_PAYMENTACTION', 'value' => null, 'required' => true);
        $this->parameters['currencyCode'] = array('name' => 'CURRENCYCODE', 'value' => null, 'required' => true);
        $this->parameters['returnUrl'] = array('name' => 'RETURNURL', 'value' => null, 'required' => true);
        $this->parameters['cancelUrl'] = array('name' => 'CANCELURL', 'value' => null, 'required' => true);
        $this->parameters['noShipping'] = array('name' => 'noshipping', 'value' => 1, 'required' => false);
        $this->parameters['image'] = array('name' => 'HDRIMG', 'value' => null, 'required' => false);
        $this->parameters['landingPage'] = array('name' => 'LANDINGPAGE', 'value' => 'Billing', 'required' => false);
        $this->parameters['cartBorderColor'] = array('name' => 'CARTBORDERCOLOR', 'value' => null, 'required' => false);
        $this->parameters['billingType'] = array('name' => 'BILLINGTYPE', 'value' => 'MerchantInitiatedBilling', 'required' => false);
        $this->parameters['billingAgreementDesctiption'] = array('name' => 'L_BILLINGAGREEMENTDESCRIPTION0', 'value' => null, 'required' => false);
        $this->parameters['paymentType'] = array('name' => 'PAYMENTTYPE', 'value' => 'Any', 'required' => false);
        $this->parameters['billingAgreementCustom'] = array('name' => 'BILLINGAGREEMENTCUSTOM', 'value' => null, 'required' => false);
        $this->parameters['itemAmount'] = array('name' => 'PAYMENTREQUEST_0_ITEMAMT', 'value' => null, 'required' => true);
        $this->parameters['totalAmount'] = array('name' => 'PAYMENTREQUEST_0_AMT', 'value' => null, 'required' => true);
    }
}