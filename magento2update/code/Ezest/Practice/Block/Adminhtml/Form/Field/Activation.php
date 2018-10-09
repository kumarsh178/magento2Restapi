<?php
namespace Ezest\Practice\Block\Adminhtml\Form\Field;
class Activation extends  \Magento\Framework\View\Element\Html\Select
{
	/**
     * Model Enabledisable
     *
     * @var \Magento\Config\Model\Config\Source\Enabledisable
     */
	protected $_enableDisable;

	  /**
     * Activation constructor.
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param \Magento\Config\Model\Config\Source\Enabledisable $enableDisable $enableDisable
     * @param array $data
     */

	  public function __construct(
	  	\Magento\Framework\View\Element\Context $context,
	  	\Magento\Config\Model\Config\Source\Enabledisable $enableDisable,array $data = []){
	  	 parent::__construct($context, $data);
        $this->_enableDisable = $enableDisable;
	  }
	  /**
     * @param string $value
     * @return Magently\Tutorial\Block\Adminhtml\Form\Field\Activation
     */
	  public function setInputName($value){
	  	return $this->setInputName($value);
	  }
	   /**
     * Parse to html.
     *
     * @return mixed
     */
	   public function _toHtml(){
	   		if(!$this->getOptions()){
	   			$attributes = $this->_enableDisable->toOptionArray();
	   			foreach($attributes as $attribute){
	   				$this->addOption($attribute['value'],$attribute['label']);
	   			}
	   		}
	   		return parent::_toHtml();
	   }
}