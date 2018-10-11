<?php
namespace Ezest\Customeav\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
	private $_employeeFactory;
	private $_departmentFactory;

	public function __construct(\Ezest\Customeav\Model\EmployeeFactory $employeeFactory,
		\Ezest\Customeav\Model\DepartmentFactory $departmentFactory){
		$this->_employeeFactory = $employeeFactory;
		$this->_departmentFactory = $departmentFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
		$setup->startSetup();
       
        $salesDepartment = $this->_departmentFactory->create();
        $salesDepartment->setName('Sales');
        $salesDepartment->save();
        $employee = $this->_employeeFactory->create();
        $employee->setDepartmentId($salesDepartment->getId());
        $employee->setEmail('jyu@dummy.com');
        $employee->setFirstName('Jeff');
        $employee->setLastName('Yu');
        $employee->setServiceYears(3);
        $employee->setDob('1999-01-01');
        $employee->setSalary('5400.00');
        $employee->setVatNumber('GB12345678');
        $employee->setNote('Just some notes to Jeff');
        $employee->save();

        $setup->endSetup();
	}
}
