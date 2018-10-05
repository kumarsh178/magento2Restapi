<?php
namespace Ezest\Customeav\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Department extends AbstractDb
{
   public function _construct(){
   	 /* tablename, primarykey*/
   	 $this->_init('customeav_department','id');
   }

}