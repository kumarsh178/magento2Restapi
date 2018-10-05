<?php 
namespace Ezest\Practice\Model\Source;
class Location implements \Magento\Framework\Option\ArrayInterface
{
	protected $_helper;
	public function __construct(\Ezest\Practice\Helper\Data $practiceHelper){
		$this->_helper = $practiceHelper;
	}
	public function toOptionArray(){
		$array = [];
			foreach($this->_helper->getLocations() as $value){
				$array[] = array('value'=>$value,'label'=>ucfirst($value));
			}
			return $array;
	}
	public function toArray(){
		$array = $this->_helper->getLocations();
		return $this->_helper->getLocations();
	}
}