<?php
namespace Ezest\Customchart\Block;
class Toplinks extends \Magento\Framework\View\Element\Html\Link {
	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Wishlist\Helper\Data $wishlistHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }
    

}