<?php
namespace Users\Roles\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{
	/**
     * RoleFactory
     *
     * @var roleFactory
     */
    private $roleFactory;
 
     /**
     * RulesFactory
     *
     * @var rulesFactory
     */
    private $rulesFactory;
    /**
     * Init
     *
     * @param \Magento\Authorization\Model\RoleFactory $roleFactory
     * @param \Magento\Authorization\Model\RulesFactory $rulesFactory
     */

    public function __construct(
    	\Magento\Authorization\Model\RoleFactory $roleFactory,
    	\Magento\Authorization\Model\RulesFactory $rulesFactory)
    {
    	$this->roleFactory =$roleFactory;
    	$this->rulesFactory = $rulesFactory;

    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup,ModuleContextInterface $context){
    	$role = $this->roleFactory->create();
    }
} 