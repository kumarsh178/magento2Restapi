<?php
namespace Ezest\Customchart\Block\Adminhtml\Edit;
class SaveButton extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
	public function getButtonData(){
         return [
            'label' => __('Save Post'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
	}
}