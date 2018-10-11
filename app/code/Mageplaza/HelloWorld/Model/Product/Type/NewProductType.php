<?php
namespace Mageplaza\HelloWorld\Model\Product\Type;
class NewProductType extends \Magento\Catalog\Model\Product\Type\AbstractType
{
	const TYPE_ID = 'new_product_type';
	public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product){

	}
}