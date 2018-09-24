<?php
namespace Ezest\Customchart\Controller\Adminhtml\Post;
class Create extends \Magento\Backend\App\Action
{
	private $_resultForwordFactory;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Backend\Model\View\Result\ForwardFactory $resultForwordFactory
	){
		parent::__construct($context);
		$this->_resultForwordFactory = $resultForwordFactory;
	}
	public function execute(){
		$forword = $this->_resultForwordFactory->create();
		return $forword->forward('edit');
	}
}