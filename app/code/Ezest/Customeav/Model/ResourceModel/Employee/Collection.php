<?php
namespace Ezest\Customeav\Model\ResourceModel\Employee;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection{
	protected function _construct(){
		 /* Full model classname, full resource classname */
		 $this->_init('Ezest\Customeav\Model\Employee','Ezest\Customeav\Model\ResourceModel\Employee');
	}
}