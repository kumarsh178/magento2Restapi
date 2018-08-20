
<?php

namespace Ezest\Practice\Cron;

class Test
{

	public function execute()
	{
		echo 'helooo'; exit;
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info(__METHOD__);

		return $this;

	}
}