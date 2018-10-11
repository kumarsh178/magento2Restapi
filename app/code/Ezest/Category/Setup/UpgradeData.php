<?php 
namespace Ezest\Category\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
	private $_eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory){
		$this->_eavSetupFactory = $eavSetupFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
		$eavSetup = $this->_eavSetupFactory->create(['setup'=>$setup]);
		$eavSetup->addAttributeGroup(
			\Magento\Catalog\Model\Category::ENTITY,
			$eavSetup->getDefaultAttributeSetId(\Magento\Catalog\Model\Category::ENTITY),
			'Mynew Group Name',
			99
		);
		if(version_compare($context->getVersion(), '1.0.1') < 0){
				$eavSetup->addAttribute(
				 	\Magento\Catalog\Model\Category::ENTITY,
				    'my_attribute_code',
				    [
				        'type'              => 'varchar',
				        'input'             => 'text',
				        'source'            => '',
				        'label'             => 'mY Attribute Code',
				        'group'             => 'Mynew Group Name',
				        'visible'           => 1,
				        'required'     => false
				    ]);
		}
		if(version_compare($context->getVersion(), '1.0.2')<0){
			$eavSetup->addAttribute(
	            \Magento\Catalog\Model\Category::ENTITY, 'custom_image', [
	                'type' => 'varchar',
	                'label' => 'Custom Image',
	                'input' => 'image',
	                'backend' => 'Magento\Catalog\Model\Category\Attribute\Backend\Image',
	                'required' => false,
	                'sort_order' => 9,
	                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
	                'group' => 'General Information',
	            ]
	        );
		}
		if(version_compare($context->getVersion(), '1.0.3')){
				$eavSetup->addAttribute(
					\Magento\Catalog\Model\Product::ENTITY,
					'sample_attribute',
					[
						'type' => 'text',
						'backend' => '',
						'frontend' => '',
						'label' => 'Sample Atrribute',
						'input' => 'text',
						'class' => '',
						'source' => '',
						'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
						'visible' => true,
						'required' => true,
						'user_defined' => false,
						'default' => '',
						'searchable' => false,
						'filterable' => false,
						'comparable' => false,
						'visible_on_front' => false,
						'used_in_product_listing' => true,
						'unique' => false,
						'apply_to' => ''
					]
				);
		}
		//echo ' version :'.$context->getVersion(); exit;
		if(version_compare($context->getVersion(), '1.0.4') < 0){
			$eavSetup->addAttribute(
					\Magento\Catalog\Model\Product::ENTITY,
					'sample_attribute2',
					[
						'type' => 'text',
						'backend' => '',
						'frontend' => '',
						'label' => 'Sample Atrribute2',
						'input' => 'select',
						'class' => '',
						'source' => 'Ezest\Category\Model\Source\Options',
						'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
						'visible' => true,
						'required' => false,
						'user_defined' => false,
						'default' => '',
						'searchable' => false,
						'filterable' => false,
						'comparable' => false,
						'visible_on_front' => false,
						'used_in_product_listing' => true,
						'unique' => false,
						'apply_to' => ''
					]
				);
		}

		// for remove attribute
		/* $eavSetup->removeAttribute(
          \Magento\Catalog\Model\Product::ENTITY,
           'sample_attribute');*/
	}
}
