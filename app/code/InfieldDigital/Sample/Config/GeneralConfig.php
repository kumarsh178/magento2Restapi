<?php namespace InfieldDigital\Sample\Config;


class GeneralConfig
{
    const XML_ENABLED = 'general_sample_settings/basic/enable';
    const XML_REDIRECT_ON_CHECKOUT_SUCCESS = 'general_sample_settings/checkout/redirect_on_checkout_success';
    const XML_AEM_CHECKOUT_SUCCESS_URL = 'general_sample_settings/checkout/aem_checkout_success_url';
    const XML_INCLUDE_ORDER_NUMBER = 'general_sample_settings/checkout/include_order_number';

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\App\Cache\StateInterface $cacheState
     * @param \Magento\Framework\Encryption\Encryptor $encryptor
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\App\Cache\StateInterface $cacheState,
        \Magento\Framework\Encryption\Encryptor $encryptor
    ) {
        $this->_scopeConfig = $scopeConfig;
        $this->_cacheState = $cacheState;
        $this->encryptor = $encryptor;
    }

    public function enabled(){
        return $this->_scopeConfig->getValue(self::XML_ENABLED) == true;
    }

    public function redirectOnCheckoutSuccess(){
        return $this->_scopeConfig->getValue(self::XML_REDIRECT_ON_CHECKOUT_SUCCESS) == true;
    }

    public function aemCheckoutSuccessUrl(){
        $value = $this->_scopeConfig->getValue(self::XML_AEM_CHECKOUT_SUCCESS_URL);
        if(! $value){
            $value = "http://localhost:4502";
        }
        return $value;
    }


    public function includeOrderNumberInQueryString(){
        return $this->_scopeConfig->getValue(self::XML_INCLUDE_ORDER_NUMBER) == true;
    }


}