<?php

namespace Ezest\Practice\Controller\Index;

class Showhandles extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_processorInterface;

	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\View\Layout\ProcessorInterface $processorInterface){
			$this->_pageFactory = $pageFactory;
			$this->_processorInterface = $processorInterface;
			return parent::__construct($context);
	}
    public function execute()
    {
    	$this->_processorInterface->getHandles();
    	exit;
    }
}