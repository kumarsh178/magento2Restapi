<?php
namespace Ezest\Category\Model\Source;
use Magento\Framework\DB\Ddl\Table;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

/**
* @var OptionFactory
*/
protected $optionFactory;
	/**
	* @param OptionFactory $optionFactory
	*/
	/**
	* Get all options
	*
	* @return array
	*/
	public function getAllOptions()
	{
		/* your Attribute options list*/
		$this->_options=[
			['label'=>'Select Options', 'value'=>''],
			['label'=>'Bestsellers', 'value'=>'0'],
			['label'=>'Newest', 'value'=>'1'],
			['label'=>'Hot', 'value'=>'2'],
			['label'=>'Favourite', 'value'=>'3']
		];
		return $this->_options;
	}

}