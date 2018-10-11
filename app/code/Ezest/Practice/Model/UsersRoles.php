<?php
namespace Ezest\Practice\Model;
use Magento\Authorization\Model\Acl\Role\Group as RoleGroup;
use Magento\Authorization\Model\UserContextInterface;

class UsersRoles
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
        \Magento\Authorization\Model\RoleFactory $roleFactory, /* Instance of Role*/
        \Magento\Authorization\Model\RulesFactory $rulesFactory /* Instance of Rule */
        /*this define that which resource permitted to wich role */
        )
    {
        $this->roleFactory = $roleFactory;
        $this->rulesFactory = $rulesFactory;
    }
 
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function createRole()
    {
        /**
        * Create Warehouse role 
        */
        $role=$this->roleFactory->create();
        $role->setName('YourRoleName') //Set Role Name Which you want to create 
                ->setPid(0) //set parent role id of your role
                ->setRoleType(RoleGroup::ROLE_TYPE) //ROLE_TYPE = G
                ->setUserType(UserContextInterface::USER_TYPE_ADMIN); // USER_TYPE_ADMIN = 2;
        $role->save();
        /* Now we set that which resources we allow to this role */
        $resource=['Magento_Backend::admin',
                    'Magento_Sales::sales',
                    'Magento_Sales::create',
                    'Magento_Sales::actions_view', //you will use resource id which you want tp allow
                    'Magento_Sales::cancel'
                  ];
        /* Array of resource ids which we want to allow this role*/
        $this->rulesFactory->create()->setRoleId($role->getId())->setResources($resource)->saveRel();
    }
}