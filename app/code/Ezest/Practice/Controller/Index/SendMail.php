<?php
namespace Ezest\Practice\Controller\Index;

class SendMail extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_practiceHelper;

	public function __construct(\Magento\Framework\App\Action\Context $context,\Magento\Framework\View\Result\PageFactory $pageFactory,\Ezest\Practice\Helper\Data $helper){
			$this->_pageFactory =$pageFactory;
			$this->_practiceHelper = $helper;
			return parent::__construct($context);
	}

	public function execute(){
		$textDisplay = new \Magento\Framework\DataObject(array('text'=>'heloo ezest practice'));
		//echo get_class($this->_eventManager); exit;
		$this->_eventManager->dispatch('ezest_practice_display_text',['mp_text'=>$textDisplay]);
		echo $textDisplay->getText(); exit;
		/* try{
		$this->_practiceHelper->sendCustomEmail();
		echo 'Mail Send Successfully'; exit;
		}catch(\Exception $e){
		 echo $e->getMessage();
		//return $this->_pageFactory->create();
		}
		*/
	}
}