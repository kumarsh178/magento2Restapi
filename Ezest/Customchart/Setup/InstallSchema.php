<?php
namespace Ezest\Customchart\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
	public function install(
		\Magento\Framework\Setup\SchemaSetupInterface $setup,
		\Magento\Framework\Setup\ModuleContextInterface $context){
		$installer = $setup;
		$installer->startSetup();
		if(!$installer->tableExists('ezest_customchart_posts')){
			$table = $installer->getConnection()->newTable(
				$installer->getTable('ezest_customchart_posts')
			)->addColumn('post_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity'=>true,
							'nullable'=>false,
							'primary'=>true,
							'unsigned'=>true
						],
						'POST ID')
			->addColumn('name',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable'=>false],
				'POST Name')
			->addColumn('url_key',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'64k',
				[],
				'URL KEY'
			)
			->addColumn('post_content',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'POST CONTENT'
			)
			->addColumn('tags',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'TAGS'
			)
			->addColumn('status',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				1,
				[],
				'STATUS'
			)
			->addColumn('featured_image',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'FEATURED IMAGE'
			)
			->addColumn('created_at',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
				'Created At'

			)->addColumn('updated_at',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
				'Updated At'
			)->setComment('POST TABLE');
			$installer->getConnection()->createTable($table);

			// adding index for speed optimization
			$installer->getConnection()->addIndex(
				$installer->getTable('ezest_customchart_posts'),
				$setup->getIdxName($installer->getTable('ezest_customchart_posts'),
					['name','url_key','post_content','tags','featured_image'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name','url_key','post_content','tags','featured_image'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}