<?php
namespace Ezest\Practice\Block\Widget;
use \Magento\Framework\View\Element\Template;
use \Magento\Widget\Block\BlockInterface;
class Post extends Template implements BlockInterface
{
	protected $_practiceFactory;
	protected $_helper;
	public function __construct(Template\Context $context,\Ezest\Practice\Model\PracticeFactory $practicefactory,\Ezest\Practice\Helper\Data $practiceHelper){
		$this->_practiceFactory = $practicefactory;
		$this->_helper=$practiceHelper;
		parent::__construct($context);
	}
	protected $_template = "widget/posts.phtml";
	public function getPracticeList(){

		$location = !empty($this->getLocation());
		$record = $this->getRecord();
		if(empty($location))
		{
			$location = 'Kothrud';
		}
		if(empty($record)){
			$record =50;
		}
		return $this->_practiceFactory->create()->getCollection()->addFieldToFilter('location',array('eq'=>$location))->setPageSize($record)->load();
	}
}
