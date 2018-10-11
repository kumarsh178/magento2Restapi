<?php
namespace Ezest\Customeav\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
	const ENTITY = 'customeav_employee';

	protected function _construct(){
		$this->_init('Ezest\Customeav\Model\ResourceModel\Employee');
	}
}