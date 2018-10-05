<?php
namespace Ezest\Customeav\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup,\Magento\Framework\Setup\ModuleContextInterface $context){

        $table = $setup->getConnection()
            ->newTable($setup->getTable('customeav_department'))
            ->addColumn(
                'id', 
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'unsigned'=>true, 'nullable'=>false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'Name'
            )
            ->setComment('Customeav Department Table');
        $setup->getConnection()->createTable($table);

        /** Creating eav tables **/
        $employeeEntity = \Ezest\Customeav\Model\Employee::ENTITY;
        // entity table
        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned'=>true, 'nullable'=>false, 'primary' => true],
                'Entity Id'
            )
            ->addColumn(
                'department_id', 
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned'=>true, 'nullable'=>false],
                'Department Id'
            )
            ->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'EMail'
            )
            ->addColumn(
                'first_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'First Name'
            )
            ->addColumn(
                'last_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'Last Name'
            )
            ->setComment('Customeav Employee Table');
        	$setup->getConnection()->createTable($table);

        	//entity decimal table
        	$table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity_decimal'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'nullable'=>false, 'primary'=>true],
                'Value ID'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned'=>true, 'nullable'=>false, 'default'=>'0'],
                'Attribute Id'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned'=>true, 'nullable'=>false, 'default'=>'0'],
                'Store ID'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable'=>false, 'default'=>'0'],
                'Entity Id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                [],
                'value'
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_decimal',
                ['entity_id', 'attribute_id', 'store_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE),
                ['entity_id', 'attribute_id', 'store_id'],
                ['type'=>\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_decimal',
                ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_decimal',
                ['attribute_id']),
                ['attribute_id']
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_decimal',
                    'attribute_id',
                    'eav_attribute',
                    'attribute_id'
                ),
                'attribute_id',
                $setup->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_decimal',
                    'entity_id',
                    $employeeEntity . '_entity',
                    'entity_id'
                ),
                'entity_id',
                $setup->getTable($employeeEntity . '_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_decimal', 'store_id', 'store', 'store_id'
                ),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Employee Decimal Attribute Backend Table');
        $setup->getConnection()->createTable($table);
        $setup->endSetup();

	}
}