<?php
namespace Ezest\Category\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterFace;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterFace
{
	private $eavSetupFactory;
	public function __construct(EavSetupFactory $eavSetupFactory){
		$this->eavSetupFactory = $eavSetupFactory;
	}
	//\Magento\Catalog\Model\Category::ENTITY = catalog_category
	public function install(ModuleDataSetupInterface $setup,ModuleContextInterface $context){
			$eavSetup = $this->eavSetupFactory->create(['setup'=>$setup]);
			$eavSetup->addAttribute(
				\Magento\Catalog\Model\Category::ENTITY,
				'mp_new_attribute',
				[
					'type'=>'varchar',
					'label'=>'Ezest Attribute',
					'input'=>'text',
					'sort_order'=>'100',
					'source'=>'',
					'global'=>1,
					'visible'=>true,
					'required'=>false,
					'user_defined'=>false,
					'default'=>null,
					'group'=>'',
					'backend'=>''
				]);
			$eavSetup->addAttribute(
			\Magento\Catalog\Model\Category::ENTITY,
			'mp_new_attribute2',
			[
				'type'         => 'varchar',
				'label'        => 'Ezest Select Attribute',
				'input'        => 'select',
				'sort_order'   => 100,
				'source'       => 'Ezest\Category\Model\Source\Options',
				'global'       => 1,
				'visible'      => true,
				'required'     => false,
				'user_defined' => false,
				'default'      => null,
				'group'        => '',
				'backend'      => ''
			]
		);
	}
}