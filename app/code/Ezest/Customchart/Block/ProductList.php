<?php
namespace Ezest\Customchart\Block;
class ProductList extends \Magento\Framework\View\Element\Template
{
	public $_productCollectionFactory;
	private $_categoryInterfaceFactory;
	private $_categoryRepositoryInterface;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
		\Magento\Catalog\Api\Data\CategoryInterfaceFactory $categoryinterface,
		\Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepositoryInterface){
		$this->_productCollectionFactory = $productCollectionFactory;
		$this->_categoryInterfaceFactory = $categoryinterface;
		$this->_categoryRepositoryInterface  =$categoryRepositoryInterface;
		parent::__construct($context);
	}

	protected function _prepareLayout(){
		parent::_prepareLayout();
		$this->setTemplate('Ezest_Customchart::productlist.phtml');
		return $this;
	}

	public function getProductCollection(){
		$productCollection = $this->_productCollectionFactory->create();
		$productCollection->addAttributeToSelect('*');
		$productCollection->setPageSize(10);
		return $productCollection;
	}
	public function getSimpleProducts(){
		$collection = $this->_productCollectionFactory->create();
		 $collection->addAttributeToSelect('*');
    		$collection->addAttributeToFilter('type_id', \Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
		return $collection;
	}
	public function createCategory(){
		$category = $this->_categoryInterfaceFactory->create();
		$category->setName('Test Category');
		$category->setParentId(1);
		$category->setIsActive(1);
		$category->setCustomAttributes(
			['description'=>'lorem spam',
			'meta_title'=>'meta title test',
			'meta_keywords'=>'meta keywords test',
			'meta_description'=>'meta description test']
		);
		$this->_categoryRepositoryInterface->save($category);
	}
}