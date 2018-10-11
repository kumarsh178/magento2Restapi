<?php
namespace Ezest\Customeav\Model;
use Magento\Framework\Model\AbstractModel;

class Department extends AbstractModel
{
	public function _construct(){
		$this->_init('Ezest\Customeav\Model\ResourceModel\Department');
	}
}