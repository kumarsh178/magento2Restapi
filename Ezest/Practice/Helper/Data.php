<?php
namespace Ezest\Practice\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
class Data extends AbstractHelper
{
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
}