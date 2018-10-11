<?php

namespace Ezest\Practice\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
    protected $_sitemap;
    protected $_storeManager;
    protected $_storeConfigInterface;
    protected $_usersRoles;

	public function __construct(\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Sitemap\Model\ResourceModel\Cms\PageFactory $sitemap,
         \Magento\Store\Model\StoreManagerInterface $storeManager,
         \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
         \Ezest\Practice\Model\UsersRoles $userRoles
        ){
			$this->_pageFactory = $pageFactory;
            $this->_storeManager = $storeManager;
            $this->_sitemap = $sitemap;
            $this->_storeConfigInterface = $scopeConfig;
            $this->_usersRoles = $userRoles;
			return parent::__construct($context);
	}
    public function execute()
    {

        //$sitemap = $this->_sitemap->create();
      // echo  $this->_storeConfigInterface->getValue('practice_section/general/enable',\Magento\Store\Model\ScopeInterface::SCOPE_STORE); exit;
        /*echo '<pre>';
        print_r($sitemap->getCollection($this->_storeManager->getStore()->getId())); exit;*/
    	/* $resultPage = $this->_pageFactory->create();
	 	$block = $resultPage->getLayout()->getBlock('customer.account.link.back');
        if ($block) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
    	 return $resultPage; */
    }
}