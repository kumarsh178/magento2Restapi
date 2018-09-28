<?php
namespace Ezest\Customchart\ViewModel;
class CustomBlock implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
	public $_test = 'heloo test hi';

	public $_postFactory;
	/**
     * @return \Magento\Cms\Api\Data\PageInterface[]
     */
	public function __construct(\Ezest\Customchart\Model\PostFactory $postFactory){
		$this->_postFactory = $postFactory;
	}
    public function getItems()
    {
       return 'helooo test';
    }
}