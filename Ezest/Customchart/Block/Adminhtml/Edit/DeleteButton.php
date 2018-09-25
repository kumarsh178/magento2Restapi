<?php
namespace Ezest\Customchart\Block\Adminhtml\Edit;
class DeleteButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
	 /**
     * @return array
     */
    public function getButtonData()
    {
            $data = [
                'label' => __('Delete Customer'),
                'class' => 'delete',
                'id' => 'customer-edit-delete-button',
                'data_attribute' => [
                    'url' => $this->getDeleteUrl()
                ],
                'on_click' => '',
                'sort_order' => 20,
            ];
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return ('*/*/delete/id/1');
    }
}
?>