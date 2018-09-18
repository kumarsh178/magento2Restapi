<?php
namespace Ezest\Customchart\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix ='ezest_customchart_posts_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct(){
		$this->_init('Ezest\Customchart\Model\Post','Ezest\Customchart\Model\ResourceModel\Post');
	}
}