<?php
namespace Ezest\Customchart\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'ezest_customchart_posts';
	protected $_cacheTag = 'ezest_customchart_posts';
	protected $_eventPrefix = 'ezest_customchart_posts';

	protected function _construct(){
		$this->_init('Ezest\Customchart\Model\ResourceModel\Post');
	}
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}