<?php
namespace Ezest\Customchart\Controller\Index;
class Testjs extends \Magento\Framework\App\Action\Action
{
	private $_pageFactory;
	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory){
			$this->_pageFactory = $pageFactory;
			parent::__construct($context);
	}

	public function execute(){
		$resultPage = $this->_pageFactory->create();
		return $resultPage;
	}
}