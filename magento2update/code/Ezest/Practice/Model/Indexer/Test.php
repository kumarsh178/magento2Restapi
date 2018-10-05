<?php
namespace Ezest\Practice\Model\Indexer;
class Test implements \Magento\Framework\Indexer\ActionInterface, \Magento\Framework\Mview\ActionInterface
{
	protected $_logger;

    public function __construct(\Psr\Log\LoggerInterface $logger){
    	$this->_logger = $logger;
    }

	/*
	 * Used by mview, allows process indexer in the "Update on schedule" mode
	 */
	public function execute($ids){
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/practice_indexer.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info('execute method run'.$ids);

	}

	/*
	 * Will take all of the data and reindex
	 * Will run when reindex via command line
	 */
	public function executeFull(){
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/practice_indexer.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info('executeFull method run');

	}
   
   
	/*
	 * Works with a set of entity changed (may be massaction)
	 */
	public function executeList(array $ids){
	$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/practice_indexer.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info('executeList method run'.$ids);
	}
   
   
	/*
	 * Works in runtime for a single entity using plugins
	 */
	public function executeRow($id){
		$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/practice_indexer.log');
		$logger = new \Zend\Log\Logger();
		$logger->addWriter($writer);
		$logger->info('executeList method run'.$id);
	}
}