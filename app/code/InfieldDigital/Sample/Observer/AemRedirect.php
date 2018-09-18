<?php

namespace InfieldDigital\Sample\Observer;

use InfieldDigital\Sample\Config\GeneralConfig;
use Magento\Framework\App\ResponseFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;


class AemRedirect implements ObserverInterface
{
    /**
     * @var ResultFactory
     */
    private $resultFactory;
    /**
     * @var ResponseFactory
     */
    private $responseFactory;
    /**
     * @var GeneralConfig
     */
    private $generalConfig;
    /**
     * @var Order
     */
    private $order;

    /**
     * AemRedirect constructor.
     * @param ResponseFactory $responseFactory
     * @param GeneralConfig $generalConfig
     * @param Order $order
     */
    public function __construct(ResponseFactory $responseFactory,
                                GeneralConfig $generalConfig,
                                Order $order)
    {
        $this->responseFactory = $responseFactory;
        $this->generalConfig = $generalConfig;
        $this->order = $order;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $orderIds = $observer->getData('order_ids');
        $event = $observer->getEvent();

        $redirectUrl = $this->generalConfig->aemCheckoutSuccessUrl();

        if($this->generalConfig->includeOrderNumberInQueryString()){
            //make sure we have an array with an element in it
            if(is_array($orderIds) && count($orderIds) > 0){
                $order = $this->order->load($orderIds[0]);
                $friendlyId = $order->getIncrementId();
                $redirectUrl .= "?order=" . $friendlyId;
            }
        }
        //We shouldn't die here but this is a "safetey measure" against some strange redirect behavior in a demo
        $this->responseFactory->create()->setRedirect($redirectUrl)->sendResponse();
        die();
    }
}