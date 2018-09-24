<?php

namespace Ezest\Practice\Block\Index;


class Index extends \Magento\Framework\View\Element\Template {

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, array $data = []) {

        parent::__construct($context, $data);

    }
    public function setTitle($title)
	{
		return $this->title = $title;
	}

	public function getTitle()
	{
        echo '<pre>';
        print_r($this->getSecond());
		return $this->getFirst();
	}
    protected function _afterToHtml($html)
    {
        return $html . '<div>Killroy was here</div>';
    }
}