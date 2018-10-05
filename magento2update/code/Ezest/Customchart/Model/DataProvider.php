<?php
namespace Ezest\Customchart\Model;
 
use Ezest\Customchart\Model\ResourceModel\Post\CollectionFactory;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $employeeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    private $_collection;

    protected $_loadedData;
   
    /**
     * @var array
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Ezest\Customchart\Model\ResourceModel\Post\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->_collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
       if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->_collection->getItems();
        foreach ($items as $employee) {
            $this->_loadedData[$employee->getPostId()] = $employee->getData();
        }
        return $this->_loadedData;
    }
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }
}