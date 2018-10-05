<?php
 
namespace Conns\Loginredirect\Controller\Index;

use Magento\Framework\App\Action\Context;

 
class Index extends \Magento\Framework\App\Action\Action
{

	
	public function __construct(
        \Magento\Framework\App\Action\Context $context) {
		
		parent::__construct($context);
    }
    public function execute()
	{
		echo 'test';
		exit;
	}
}