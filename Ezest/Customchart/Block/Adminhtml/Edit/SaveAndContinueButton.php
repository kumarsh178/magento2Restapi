<?php 
namespace Ezest\Customchart\Block\Adminhtml\Edit;
use \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
class SaveAndContinueButton implements ButtonProviderInterface
{
	public function __construct( \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry){

		 //parent::__construct($context, $registry);
	}
	public function getButtonData(){
            $data = [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit'],
                    ],
                ],
                'sort_order' => 80,
            ];
        return $data;
	}
}