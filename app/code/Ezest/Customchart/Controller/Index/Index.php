<?php
namespace Ezest\Customchart\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_postFactory;
	protected $_employeeFactory;

	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Ezest\Customchart\Model\PostFactory $postFactory,
		\Ezest\Customeav\Model\EmployeeFactory $employeeFactory
	){

			$this->_pageFactory = $pageFactory;
			$this->_postFactory = $postFactory;
			$this->_employeeFactory = $employeeFactory;
			return parent::__construct($context);
	}
	public function execute(){
		$post = $this->_postFactory->create();
		$collection = $post->getCollection();
		$resultPage = $this->_pageFactory->create();
		$employeeCollection = $this->_employeeFactory->create();
		echo '<pre>';
		print_r($employeeCollection->getCollection()->getData());
		exit;
		/*echo 'helooo'; exit;
		echo 'Module data';
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
		}
		exit();*/
		return $resultPage;
	}
}