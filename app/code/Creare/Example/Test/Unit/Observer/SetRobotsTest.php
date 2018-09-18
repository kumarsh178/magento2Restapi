<?php
 
namespace Creare\Example\Test\Unit\Observer;
use Creare\Example\Observer\SetRobots;
 
class SetRobotsTest extends \PHPUnit\Framework\TestCase
{
    protected $observer;
    protected $observerMock;
    protected $creareHelper;
    protected $config;
 
    public function setUp()
    {
 
        $this->creareHelper = $this->getMockBuilder('Creare\Example\Helper\Data')
            ->disableOriginalConstructor()
            ->getMock();
 
        $this->config = $this->getMockBuilder('Magento\Framework\View\Page\Config')
            ->disableOriginalConstructor()
            ->getMock();
 
        $this->observer = new SetRobots(
            $this->creareHelper,
            $this->config
        );
 
        $this->observerMock = $this->createMock('\Magento\Framework\Event\Observer', [], [], '', false);
    }
 
    public function testRobotsReturnsTrueWhenConfigIsTrue()
    {
        $this->creareHelper->expects($this->once())
            ->method('getConfig')
            ->will($this->returnValue(true));
 
        $observerReturnValue = $this->observer->execute($this->observerMock);
        $this->assertEquals($observerReturnValue, true);
    }
    public function testExample(){
        $this->creareHelper->expects($this->once())->method('getTest')->will($this->returnValue(true));
        $this->assertEquals($this->creareHelper->getTest(),true);
    }
}