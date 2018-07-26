<?php

namespace Ezest\Practice\Block\Index;


class Index extends \Magento\Framework\View\Element\Template {

    public function __construct(\Magento\Catalog\Block\Product\Context $context, array $data = []) {

        parent::__construct($context, $data);

    }


    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

}