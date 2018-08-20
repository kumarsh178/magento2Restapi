<?php
namespace Ezest\Practice\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\DataObject;
class Data extends AbstractHelper
{
	protected $_storeManager;
	protected $_inlineTranslation;
	protected $_transportBuilder;
	protected $_practiceModel;
	public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager,\Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,\Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,\Ezest\Practice\Model\Practice $practiceModel){
		$this->_storeManager = $storeManager;
		$this->_inlineTranslation = $inlineTranslation;
		$this->_transportBuilder = $transportBuilder;
		$this->_practiceModel = $practiceModel;
	}
	private $_messages=array(
		'success'=>array(
			'4000'=>'Data has been saved successfully'
		),
		'error'=>array(
			'5000'=>'Data has not been saved',
		   	'5001'=>'Mgento Error'
		)
	);	

	public function getMessage($key, $code, $replace = array(), $message = ''){
		$messageArr = array();
        if (isset($this->_messages[$key][$code])) {
            $messageArr = array(
                'code' => $code,
                'message' => vsprintf($this->_messages[$key][$code], $replace)
            );
        } else if (!empty($message)) {
            $messageArr = array(
                'code' => $code,
                'message' => vsprintf($message, $replace)
            );
            $messageArr = array(
                        'error' => array($messageArr),
                        'success' => (object) []
            );
        }
        return $messageArr;
	}
	/**
		* @param int $code,array $replace
		* @return jsonobject
		* @author Shailendra Kumar Maddheshia
		* @Date 26-07-2018
	*/
	public function getErrorMessage($code,$replace=array())
	{		
		$error = array(
                        'error' => array($this->getMessage('error', $code, $replace)),
                        'success' => (object) []
            );
      	return $error;
	}
	/**
		* @param int $code,array $replace
		* @return jsonobject
		* @author Shailendra Kumar Maddheshia
		* @Date 26-07-2018
	*/
	public function getSuccessMessage($code,$replace=array())
	{
			$success = array(
                            'success' => $this->getMessage('success', $code, $replace),
                            'error' => array()
                        );
          return $success;
	}
	public function sendCustomEmail($id){
		$templateOptions = array('area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => $this->_storeManager->getStore()->getId());
		$templateVars = array(
                    'store' => $this->_storeManager->getStore(),
                    'customer_name' => 'John Doe',
                    'message'   => 'Hello World!!.',
                    'practice' => new DataObject($this->_practiceModel->load($id)->getData())
                );
	$from = array('email' => "test@gmail.com", 'name' => 'Shailendra Kumar');
	$this->_inlineTranslation->suspend();
	$to = array('shailendra.maddheshia@e-zest.in');
	$transport = $this->_transportBuilder->setTemplateIdentifier('practice_create_practice_email_template')
	                ->setTemplateOptions($templateOptions)
	                ->setTemplateVars($templateVars)
	                ->setFrom($from)
	                ->addTo($to)
	                ->getTransport();
	$transport->sendMessage();
	$this->_inlineTranslation->resume();
	}
}