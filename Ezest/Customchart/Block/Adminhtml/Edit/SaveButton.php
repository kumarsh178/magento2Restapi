<?php
namespace Ezest\Customchart\Block\Adminhtml\Edit;
class SaveButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
	public function getButtonData(){
            $data = [
                'label' => __('Save Post'),
                'class' => 'save primary',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'save', 'target' => '#edit_form']],
                    'form-role' => 'save',
                ],
                'sort_order' => 90,
            ];
        return $data;
	}
}