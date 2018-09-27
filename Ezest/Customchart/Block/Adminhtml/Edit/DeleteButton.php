<?php
namespace Ezest\Customchart\Block\Adminhtml\Edit;
class DeleteButton extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
    private $_request;
	 /**
     * @return array
     */
     public function __construct( \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,\Magento\Framework\App\Request\Http $request){

         parent::__construct($context, $registry);
         $this->_request = $request;
    }
    public function getButtonData()
    {
            $data = [
                'label' => __('Delete POST'),
                'on_click' => "location.href="."'".$this->getDeleteUrl()."'",
                'sort_order' => 20,
            ];
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->urlBuilder->getUrl('customchart/post/delete/',array('id'=>$this->_request->getParam('id')));
    }
}
?>