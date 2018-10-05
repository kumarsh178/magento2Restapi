<?php
namespace Conns\ImageProcessor\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{

protected $_imageHelper;
protected $_resultPageFactory;

   public function __construct(
	   \Magento\Framework\App\Action\Context $context,
     \Conns\ImageProcessor\Helper\Image $imageHelper,
       \Magento\Framework\View\Result\PageFactory $resultPageFactory
)  {
     
     $this->_imageHelper = $imageHelper;
     $this->_resultPageFactory =$resultPageFactory;
     parent::__construct($context);
    }
    public function execute()
   { 
 	/*echo 'Hello World';
    exit;*/
   //$this->helperData->getImageFile();
    echo 'helooo';
    exit;
   return $this->resultPageFactory->create();

  }
}