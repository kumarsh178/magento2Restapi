<?php
namespace Ezest\Customeav\Model\ResourceModel\Department;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
	protected function _construct(){
		$this->init('Ezest\Customeav\Model\Department','Ezest\Customeav\Model\ResourceModel\Department');
	}
}