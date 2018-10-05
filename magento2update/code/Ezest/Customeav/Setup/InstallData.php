<?php
namespace Ezest\Customeav\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
    private $employeeSetupFactory;

    public function __construct(
        \Ezest\Customeav\Setup\EmployeeSetupFactory $employeeSetupFactory
    ) {
        $this->employeeSetupFactory = $employeeSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $employeeEntity = \Ezest\Customeav\Model\Employee::ENTITY;

        $employeeSetup = $this->employeeSetupFactory->create(['setup' => $setup]);

        $employeeSetup->installEntities();

        /*

        Add attributes for the employee entity

        Using the addAttribute method on the instance of \Jeff\DataTutorial\Setup\EmployeeSetupFactory, 
        we are instructing Magento to add a number of attributes to its entity.
        Within addAttribute method, there is a call to the $this->attributeMapper->map($attr, $entityTypeId) method.
        attributeMapper conforms to Magento\Eav\Model\Entity\Setup\PropertyMapperInterface, which looking at 
        vendor/magento/module-eav/etc/di.xml has a preference for the Magento\Eav\Model\Entity\Setup\PropertyMapper\Composite class,
        which further initailize the following mapper classes:

        1) Magento\Eav\Model\Entity\Setup\PropertyMapper
        2) Magento\Customer\Model\ResourceModel\Setup\PropertyMapper
        3) Magento\Catalog\Model\ResourceModel\Setup\PropertyMapper
        4) Magento\ConfigurableProduct\Model\ResourceModel\Setup\PropertyMapper

        Since we are defining our own entity types, the mapper class we are mostly interested in is Magento\Eav\Model\Entity\Setup\PropertyMapper.
        The key strings match the column names in the eav_attribute table, while the value strings match the keys of our array passed to the addAttriubte
        method of within InstallData.php

        */
        $employeeSetup->addAttribute(
            $employeeEntity, 'service_years', ['type' => 'int']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'dob', ['type' => 'datetime']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'salary', ['type' => 'decimal']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'vat_number', ['type' => 'varchar']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'not', ['type' => 'text']
        );

        $setup->endSetup();
    }
}
