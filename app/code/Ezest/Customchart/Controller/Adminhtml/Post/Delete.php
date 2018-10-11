<?php
namespace Ezest\Customchart\Controller\Adminhtml\Post;
class Delete extends \Magento\Backend\App\Action
{

protected $_postFactory;
	public function __construct(\Magento\Backend\App\Action\Context $context,
		\Ezest\Customchart\Model\PostFactory $postFactory){
			parent::__construct($context);
			$this->_postFactory = $postFactory;
	}
	public function execute(){
		$model = $this->_postFactory->create();
		try{
			$model->load($this->getRequest()->getParam('id'));
			$model->delete();
			$this->messageManager->addSuccess(__('Post has been delete'));
		}catch(\Exception $e){
			$this->messageManager->addError($e->getMessage());
		}

		return $this->resultRedirectFactory->create()->setPath('customchart/post/index');

	}
}