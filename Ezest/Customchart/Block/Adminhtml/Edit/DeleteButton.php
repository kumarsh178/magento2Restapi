<?php
namespace Ezest\Customchart\Block\Adminhtml\Edit;
class DeleteButton extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
    private $_request;
	 /**
     * @return array
     */
     public function __construct( \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,\Magento\Framework\App\RequestInterface $request){

         parent::__construct($context, $registry);
         $this->_request = $request;
    }
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
        return $this->urlBuilder->getUrl('customchart/post/delete/')
    }
}
?>