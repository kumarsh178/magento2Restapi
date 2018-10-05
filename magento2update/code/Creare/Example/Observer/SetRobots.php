<?php
 
namespace Creare\Example\Observer;
 
use Magento\Framework\Event\ObserverInterface;
 
class SetRobots implements ObserverInterface
{
    protected $_creareHelper;
    protected $_config;
 
    public function __construct(
        \Creare\Example\Helper\Data $_creareHelper,
        \Magento\Framework\View\Page\Config $_config
    )
    {
        $this->_creareHelper = $_creareHelper;
        $this->_config = $_config;
    }
 
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if ($this->_creareHelper->getConfig('setrobots'))
        {
            $this->_config->setRobots('NOINDEX, FOLLOW');
            return true;
        }
        return false;
    }
}