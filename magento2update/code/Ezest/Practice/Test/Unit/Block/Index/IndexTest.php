<?php
namespace Ezest\Practice\Test\Unit\Block\Index;
use \Ezest\Practice\Block\Index\Index;

class IndexTest extends \PHPUnit\Framework\TestCase
{
	protected $contextMock; 
	protected $blockobj;
	protected $_model;
	protected $_objectManager;
	protected function setUp(){
		$this->contextMock = $this->getMockBuilder(\Magento\Catalog\Block\Product\Context::class)->disableOriginalConstructor()
            ->getMock();
		$this->blockobj = new Index(
				$this->contextMock,
				[]
		);
		$this->_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
	}

	public function btestPrepareLayout(){
		$object = $this->blockobj->_prepareLayout();
		$this->assertEquals($object,$this->blockobj);

	}
	public function testAddData(){
		try{
			$_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$model = $_objectManager->create('\Ezest\Practice\Model\Practice');
			$data = array();
			$data['name'] = 'Shailendra Kumar';
			$data['location'] = 'Pune';
			$data['email'] = 'test@ezest.in';
			$data['dob'] = '05-11-2018';
			$data['profile_pic'] = 'jsh/dh/ip.jpg';
			print_r($data);exit;
			$model->setData($data);
			$model->save();
			echo $count = $model->getCollection()->getSize(); exit;
		}catch(LocalizedException $e){
			echo $e->getMessage(); exit;
		}
	}
}