<?php
namespace Ezest\Practice\Test\Unit\Block\Adminhtml;
use \Ezest\Practice\Block\Adminhtml\Practice;

class PracticeTest extends \PHPUnit\Framework\TestCase
{
	protected $_mockBlock;
	protected $blockobj;
	protected $mockMainBlock;

	protected function setUp(){
		$this->_mockBlock = $this->getMockBuilder(\Magento\Backend\Block\Widget\Context::class)->disableOriginalConstructor()->getMock();
		$this->blockobj = new Practice(
			$this->_mockBlock,
			[]
		);
		$this->mockMainBlock = $this->createMock(\Ezest\Practice\Block\Adminhtml\Practice::class);
	}
	public function testGetGridHtml(){
		
		$this->mockMainBlock->expects($this->once())->method('getGridHtml')->will($this->returnValue(true));
		$this->assertEquals($this->blockobj->getGridHtml(),true);
	}
}