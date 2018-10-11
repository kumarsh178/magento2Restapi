<?php
namespace Ezest\Customeav\Model\ResourceModel;
use Magento\Eav\Model\Entity\AbstractEntity;
class Employee extends AbstractEntity
{
	protected function _construct(){
		$this->_read = 'customeav_employee_read';
		$this->_write = 'customeav_employee_write';
	}
	public function getEntityType(){
		if(empty($this->_type)){
			$this->setType(\Ezest\Customeav\Model\Employee::ENTITY);
		}
		return parent::getEntityType();
	}
}