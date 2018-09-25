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
        return [];
    }
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }
}