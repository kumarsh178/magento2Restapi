<?php

namespace Ezest\Customattributes\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
/** for adding customer address attribute**/
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

class InstallData implements InstallDataInterface {
	private $_eavSetupFactory;
	private $_attributeRepository;
	private $_customerSetupFactory;
	private $_attributeSetFactory;

	public function __construct(
		\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
		\Magento\Eav\Model\AttributeRepository $attributeRepository,
		CustomerSetupFactory $customerSetupFactory,
        AttributeSetFactory $attributeSetFactory
	)
	{
		$this->_eavSetupFactory = $eavSetupFactory;
		$this->_attributeRepository = $attributeRepository;
		$this->_customerSetupFactory = $customerSetupFactory;
		$this->_attributeSetFactory = $attributeSetFactory;

	}

	public function install( ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		/** remove customer attribute **/
		$eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);

       /* $eavSetup->removeAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'customer_blood_group'
        );*/
        /** end remove attribute **/
		//$eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);

		// add customer_blood_group to customer
		//$eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, 'customer_blood_group');
		$eavSetup->addAttribute(
		\Magento\Customer\Model\Customer::ENTITY, 'customer_blood_group', [
			'type' => 'varchar',
			'label' => 'Customer Blood Group',
			'input' => 'text',
			'required' => false,
			'system' => 0,
			'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
			'sort_order' => '200'
		]
	);

	// allow customer_blood_group attribute to be saved in the specific areas
	$attribute = $this->_attributeRepository->get('customer', 'customer_blood_group');
 	//  used_in_forms are of these types you can use forms key according to your need ['adminhtml_checkout','adminhtml_customer','adminhtml_customer_address','customer_account_edit','customer_address_edit','customer_register_address', 'customer_account_create']
         
           $attribute->setData(
            'used_in_forms',
            ['adminhtml_customer', 'customer_account_create','customer_account_edit']
 
        );
        $attribute->save();

        /** Add customer address attribute **/

        $customerSetup = $this->_customerSetupFactory->create(['setup'=>$setup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer_address');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();
         /** @var $attributeSet AttributeSet */
         $attributeSet = $this->_attributeSetFactory->create();
         $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);
         $customerSetup->addAttribute('customer_address','village',[
         	'type'=>'varchar',
         	'label'=>'village',
         	'input'=>'text',
         	'required'=>false,
         	'visible'=>true,
         	'user_defined'=>true,
         	'sort_order'=>1000,
         	'position'=>1000,
         	'system'=>0
         ]);
         $attribute2 = $customerSetup->getEavConfig()->getAttribute('customer_address','village')->addData(
         	['attribute_set_id'=>$attributeSetId,'attribute_group_id'=>$attributeGroupId,
         	'used_in_forms'=>['adminhtml_customer_address','customer_address_edit','customer_register_address']]);
         $attribute2->save();

	}
}