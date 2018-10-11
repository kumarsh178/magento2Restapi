<?php
namespace Ezest\Practice\Block\Adminhtml\Form\Field;
class Navigation extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
	/**
     * @var $_attributesRenderer \Magently\Tutorial\Block\Adminhtml\Form\Field\Activation
     */
    protected $_activation;

    /**
     * Get activation options.
     *
     * @return \Magently\Tutorial\Block\Adminhtml\Form\Field\Activation
     */
    protected function _getActivationRenderer(){
    	if(!$this->_activation){
    		$this->_activation = $this->getLayout()->createBlock(
    			'\Ezest\Practice\Block\Adminhtml\Form\Field\Activation',
    			'',
    			['data'=>['is_render_to_js_template' => true]]
    		);
    	}
    	return $this->_activation;
    }
    /**
     * Prepare to render.
     *
     * @return void
     */
    protected function _prepareToRender(){
    	$this->addColumn('name',['label'=>__('Name')]);
    	$this->addColumn('link',['label'=>__('Link')]);
    	$this->addColumn('activation_attribute',
    		[
    			'label'=>__('Active'),
    			'renderer'=>$this->_getActivationRenderer()
    		]
    	);
    	$this->_addAfter = false;
    	$this->_addButtonLabel=__('Add');
    }

    /**
     * Prepare existing row data object.
     *
     * @param \Magento\Framework\DataObject $row
     * @return void
     */
    protected function _prepareArrayRow(\Magento\Framework\DataObject $row){

    	$options = [];
    	$customAttribute = $row->getData('activation_attribute');
    	$key = 'option_' .$this->_getActivationRenderer()->calcOptionHash($customAttribute);
    	$options[$key] = 'selected = "selected"';
    	$row->setData('option_extra_attrs',$options);

    }
}