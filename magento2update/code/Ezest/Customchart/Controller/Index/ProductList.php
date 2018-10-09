<?php
namespace Ezest\Customchart\Controller\Index;

class ProductList extends \Magento\Framework\App\Action\Action
{

	protected $_pageFactory;
	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory){
			parent::__construct($context);
			$this->_pageFactory = $pageFactory;
	}
	public function execute(){
		$resultPage = $this->_pageFactory->create();
		return $resultPage;
	}
}