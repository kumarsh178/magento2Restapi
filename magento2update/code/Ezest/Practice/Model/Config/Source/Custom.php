<?php
namespace Ezest\Practice\Model\Config\Source;
class Custom implements \Magento\Framework\Option\ArrayInterface
{
	/**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
	public function toOptionArray(){
		$data = array('delhi'=>'Delhi','mumbai'=>'Mumbai','pune'=>'Pune','chennai'=>'Chennai');
		return $data;
	}
}