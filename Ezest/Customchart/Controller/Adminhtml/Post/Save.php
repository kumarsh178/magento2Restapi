<?php
namespace Ezest\Customchart\Controller\Adminhtml\Post;
class Save extends \Magento\Backend\App\Action
{

	protected $_postFactory;

	public function __construct(\Magento\Backend\App\Action\Context $context,
		\Ezest\Customchart\Model\PostFactory $postFactory){
			parent::__construct($context);
			$this->_postFactory = $postFactory;
	}

	public function execute(){
		$data = $this->getRequest()->getPostValue();
	 	$resultRedirect = $this->resultRedirectFactory->create();
		if($data){
			$model = $this->_postFactory->create();
			$id = $this->getRequest()->getParam('id');
			if(!empty($id)){
				$model->load($id);
				 $model->setCreatedAt(date('Y-m-d H:i:s'));
			}
				$model->setData($data);
				//print_r($model->getData()); exit;
			 try {
                $model->save();

                $this->messageManager->addSuccess(__('The post has been saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Practice.'));
            }
             $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
		}
		return $resultRedirect->setPath('*/*/');
	}

}