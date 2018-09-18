<?php

namespace Ezest\Practice\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(\Magento\Framework\App\Action\Context $context,\Magento\Framework\View\Result\PageFactory $pageFactory){
			$this->_pageFactory = $pageFactory;
			return parent::__construct($context);
	}
    public function execute()
    {
    	$resultPage = $this->_pageFactory->create();
	 	$block = $resultPage->getLayout()->getBlock('customer.account.link.back');
        if ($block) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
    	 return $resultPage;
    }
}