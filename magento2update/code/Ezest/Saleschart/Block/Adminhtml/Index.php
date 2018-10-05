<?php
namespace Ezest\Saleschart\Block\Adminhtml;

class Index extends \Magento\Backend\Block\Template
{
	protected $_csvFile;
	protected $_moduleReader;
	public function __construct(\Magento\Framework\File\Csv $fileCsv,\Magento\Framework\Module\Dir\Reader $moduleReader,\Magento\Backend\Block\Template\Context $context){
		$this->_csvFile = $fileCsv;
		$this->_moduleReader = $moduleReader;
		parent::__construct($context);
	}

	public function readCsv(){
		// This is your CSV file.
		$directory = $this->_moduleReader->getModuleDir('etc', 'Ezest_Saleschart');
		$file = $directory . '/Sales_Prediction.csv';
		$data = $this->_csvFile->getData($file);
		$finalData=array();
		$column = array();
		$i=0;
		foreach($data as $v){
				if($i==0){
					$column = $v;
				}else{
					$labelKey = array_search('ds',$column);
					$valueKey = array_search('yhat',$column);
					$finalData[] = array('x'=>str_replace('-',',',$v[$labelKey]),'y'=>(double)$v[$valueKey]);
				}
				
				$i = $i+1;
		}
		return $finalData; 
	}	

}