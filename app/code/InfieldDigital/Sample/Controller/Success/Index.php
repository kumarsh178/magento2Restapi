<?php namespace InfieldDigital\Sample\Controller\Success;

use InfieldDigital\Sample\Config\GeneralConfig;
use Magento\Checkout\Helper\Cart;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Request\Http;
use Magento\Framework\Controller\ResultFactory;
use Magento\Quote\Model\GuestCart\GuestCartRepository;
use Magento\Quote\Model\Quote;
use Magento\Customer\Model\Session as CustomerSession;

class Index extends Action
{
    /**
     * @var \Magento\Framework\App\Request\Http
     */
    private $request;
    /**
     * @var Context
     */
    private $context;
    /**
     * @var CheckoutSession
     */
    private $checkoutSession;
    /**
     * @var GeneralConfig
     */
    private $generalConfig;

    /**
     * @inheritDoc
     */
    public function __construct(Context $context,
                                Http $request,
                                GeneralConfig $generalConfig)
    {
        parent::__construct($context);
        $this->request = $request;
        $this->context = $context;
        $this->generalConfig = $generalConfig;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        //This is a bit hacky...
        $order = $this->request->get("order");

        //If an order id is included in the url then we know we're coming back here from checkout
        if($order){
            echo '
            <html><head></head><body onload="parent.postMessage({from: \'magento\', order:\''.$order.'\'},\'*\');">            
            </body></html>
            ';
            die();
        }
    }

}