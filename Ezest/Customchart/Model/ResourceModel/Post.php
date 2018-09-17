<?php
namespace Ezest\Customchart\Model\ResourceModel;
class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context){
		parent::__construct($context);
	}
	protected function _construct(){
		$this->_init('ezest_customchart_posts','post_id');
	}
}