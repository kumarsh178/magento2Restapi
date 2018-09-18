<?php
namespace Ezest\Practice\Plugin;

class ExamplePlugin
{

	/*public function beforeSetTitle(\Ezest\Practice\Block\Index\Index $object,$title){

		echo 'Welcome practice ok ';
	}
	public function afterGetTitle(\Ezest\Practice\Block\Index\Index $object,$title){
		echo 'DONE';
	}*/
	public function aroundGetTitle(\Ezest\Practice\Block\Index\Index $subject, callable $proceed)
	{

		echo " - Before proceed() </br>";
		 $result = $proceed();
		echo " - After proceed() </br>";


		return $result;
	}
}