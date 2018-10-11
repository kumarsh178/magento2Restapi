<?php
namespace Ezest\Customeav\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Mgento\Framework\Setup\SchemaSetupInterface;
class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{
	public function upgrade(\Magento\Framework\Setup\SchemaSetupInterface $setup,\Magento\Framework\Setup\ModuleContextInterface $context){
		$setup->startSetup();
        
        $employeeEntity = \Ezest\Customeav\Model\Employee::ENTITY;
        $departmentEntityTable = 'customeav_department';
        $employeeEntityTable = $employeeEntity . '_entity';

        //Adding a foreign key to department_id 
        $setup->getConnection()
            ->addForeignKey(
                $setup->getFkName($employeeEntityTable, 'department_id', $departmentEntityTable, 'id'),
                $setup->getTable($employeeEntityTable),
                'department_id',
                $setup->getTable($departmentEntityTable),
                'id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            );

        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity_datetime'))
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
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
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
                $setup->getIdxName($employeeEntity . '_entity_datetime',
                ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_datetime',
                ['attribute_id']),
                ['attribute_id']
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_datetime',
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
                    $employeeEntity . '_entity_datetime',
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
                    $employeeEntity . '_entity_datetime', 'store_id', 'store', 'store_id'
                ),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Employee Datetime Attribute Backend Table');
        $setup->getConnection()->createTable($table);
        /** Entity Text table **/
        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity_text'))
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
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                [],
                'value'
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_text',
                ['entity_id', 'attribute_id', 'store_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE),
                ['entity_id', 'attribute_id', 'store_id'],
                ['type'=>\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_text',
                ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_text',
                ['attribute_id']),
                ['attribute_id']
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_text',
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
                    $employeeEntity . '_entity_text',
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
                    $employeeEntity . '_entity_text', 'store_id', 'store', 'store_id'
                ),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Employee text Attribute Backend Table');
        $setup->getConnection()->createTable($table);
        /** entity int table **/
        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity_int'))
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
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null, 
                [],
                'value'
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_int',
                ['entity_id', 'attribute_id', 'store_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE),
                ['entity_id', 'attribute_id', 'store_id'],
                ['type'=>\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_int',
                ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_int',
                ['attribute_id']),
                ['attribute_id']
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_int',
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
                    $employeeEntity . '_entity_int',
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
                    $employeeEntity . '_entity_int', 'store_id', 'store', 'store_id'
                ),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Employee Int Attribute Backend Table');
        $setup->getConnection()->createTable($table);
        	/** varchar table **/
        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity_varchar'))
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
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                256,
                [],
                'value'
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_varchar',
                ['entity_id', 'attribute_id', 'store_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE),
                ['entity_id', 'attribute_id', 'store_id'],
                ['type'=>\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_varchar',
                ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_varchar',
                ['attribute_id']),
                ['attribute_id']
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_varchar',
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
                    $employeeEntity . '_entity_varchar',
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
                    $employeeEntity . '_entity_varchar', 'store_id', 'store', 'store_id'
                ),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Employee Varchar Attribute Backend Table');
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
	}
}