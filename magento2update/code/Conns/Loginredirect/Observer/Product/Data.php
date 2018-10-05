<?php
namespace Conns\Loginredirect\Observer;

class Data implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
       $displayText = $observer->getData('display');
       $displayText->setDisplay('Catch magento 2 event successfully!!!');
       return $this;
    }
}