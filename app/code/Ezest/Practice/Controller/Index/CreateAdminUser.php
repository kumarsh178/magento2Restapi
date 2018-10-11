<?php
namespace Ezest\Practice\Controller\Index;
class CreateAdminUser extends \Magento\Framework\App\Action\Action
{
	private $_userModelFactory;
	private $_usersRoles;
	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\User\Model\UserFactory $userFactory,
		\Ezest\Practice\Model\UsersRoles $usersRoles
		){
		$this->_userModelFactory = $userFactory;
		$this->_usersRoles = $usersRoles;
		return parent::__construct($context);
	}
	public function execute(){
		/* $newAdminInfo = array(
							'username'=>'testadmin',
							'firstname'=>'Test',
							'lastname'=>'thomas',
							'email'=>'csk150@yopmail.com',
							'password'=>'P@ssw0rd?',
							'interface_locale'=>'en_US',
							'is_active'=>1
		);
		$userModel = $this->_userModelFactory->create();
		$userModel->setData($newAdminInfo);
		$userModel->setRoleId(2);
		try{
			$userModel->save();
			echo 'user created successfully';
		}catch(\Exception $e)
		{
			echo $e->getMessage();
		}
		exit; */
		try{

            $this->_usersRoles->createRole();
            echo 'Role has been created';

        }catch(\Exception $e){
            echo $e->getMessage();

        }
        exit;
	}
}