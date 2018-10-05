<?php
 
namespace VinaiKopp\Kitchen\Model;
 
use Magento\Framework\Model\AbstractExtensibleModel;
use VinaiKopp\Kitchen\Api\Data\HamburgerExtensionInterface;
use VinaiKopp\Kitchen\Api\Data\HamburgerInterface;
 
class Hamburger extends AbstractExtensibleModel implements HamburgerInterface
{
    const NAME = 'name';
    const INGREDIENTS = 'ingredients';
    const IMAGE_URLS = 'image_urls';
 
    protected function _construct()
    {
        $this->_init(ResourceModel\Hamburger::class);
    }
 
    public function getName()
    {
        return $this->_getData(self::NAME);
    }
 
    public function setName($name)
    {
        $this->setData(self::NAME);
    }
 
    public function getIngredients()
    {
        return $this->_getData(self::INGREDIENTS);
    }
 
    public function setIngredients(array $ingredients)
    {
        $this->setData(self::INGREDIENTS, $ingredients);
    }
 
    public function getImageUrls()
    {
        $this->_getData(self::IMAGE_URLS);
    }
 
    public function setImageUrls(array $urls)
    {
        $this->setData(self::IMAGE_URLS, $urls);
    }
 
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
 
    public function setExtensionAttributes(HamburgerExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}