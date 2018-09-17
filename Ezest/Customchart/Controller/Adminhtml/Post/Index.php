<?php
namespace Ezest\Customchart\Controller\Adminhtml\Post;
class Index extends \Magento\Backend\App\Action
{
	private $_resultPageFactory = false;

	public function __construct(\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	){
		parent::__construct($context);
		$this->_resultPageFactory = $resultPageFactory;
	}
	public function execute(){
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('Posts'));
		return $resultPage;
	}
}