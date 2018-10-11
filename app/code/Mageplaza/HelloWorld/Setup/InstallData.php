<?php
namespace Mageplaza\HelloWorld\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory){
			$this->_eavSetupFactory = $eavSetupFactory;
	}
	public function install(
			ModuleDataSetupInterface $setup,
			ModuleContextInterface $context){

		$eavSetup = $this->_eavSetupFactory->create(['setup'=>$setup]);
		$fieldList = [
			'price',
			'special_price',
			'special_from_date',
			'special_to_date',
			'minimal_price',
			'cost',
			'tier_price',
			'weight'
		];
		// make these attributes applicable to new product type

		foreach($fieldList as $field){
			$applyTo = explode(',',$eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY,$field,'apply_to'));

			if(!in_array(\Mageplaza\HelloWorld\Model\Product\Type\NewProductType::TYPE_ID,$applyTo)){
				$applyTo[] = \Mageplaza\HelloWorld\Model\Product\Type\NewProductType::TYPE_ID;
				$eavSetup->updateAttribute(\Magento\Catalog\Model\Product::ENTITY,$field,'apply_to',implode(',',$applyTo));
			}
		}
	}
}