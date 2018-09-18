<?php

namespace Ezest\Practice\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0){

		$installer->run('create table practice(entity_id int not null auto_increment, 
                name varchar(100), 
                email varchar(100), 
                location varchar(100), 
                dob DATETIME, 
                profile_pic varchar(100), 
                primary key(entity_id))');
		}

        $installer->endSetup();

    }
}