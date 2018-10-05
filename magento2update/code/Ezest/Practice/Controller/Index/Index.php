<?php

namespace Ezest\Practice\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $_sitemap;
    protected $_storeManager;

	public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Sitemap\Model\ResourceModel\Cms\PageFactory $sitemap,
         \Magento\Store\Model\StoreManagerInterface $storeManager
        ){
			$this->_pageFactory = $pageFactory;
            $this->_storeManager = $storeManager;
            $this->_sitemap = $sitemap;
			return parent::__construct($context);
	}
    public function execute()
    {

        $sitemap = $this->_sitemap->create();
        echo '<pre>';
        print_r($sitemap->getCollection($this->_storeManager->getStore()->getId())); exit;
    	/* $resultPage = $this->_pageFactory->create();
	 	$block = $resultPage->getLayout()->getBlock('customer.account.link.back');
        if ($block) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
    	 return $resultPage; */
    }
}