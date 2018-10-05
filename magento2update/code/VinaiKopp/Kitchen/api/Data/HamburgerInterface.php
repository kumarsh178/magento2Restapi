<?php
namespace VinaiKopp\Kitchen\api\Data;
use Magento\Framework\Api\ExentsibleDataInterface;

class HamburgerInterface extends ExtensibleDataInterface
{
	/**
		*@return int
	**/
	public function getId();

	/**
		*@param int $id
		*@return void
	**/
	public function setId($id);
	/**
     * @param string $name
     * @return void
     */
    public function setName($name);
 
    /**
     * @return \VinaiKopp\Kitchen\Api\Data\IngredientInterface[]
     */
    public function getIngredients();
 
    /**
     * @param \VinaiKopp\Kitchen\Api\Data\IngredientInterface[] $ingredients
     * @return void
     */
    public function setIngredients(array $ingredients);
 
    /**
     * @return string[]
     */
    public function getImageUrls();
 
    /**
     * @param string[] $urls
     * @return void
     */
    public function setImageUrls(array $urls);
 
    /**
     * @return \VinaiKopp\Kitchen\Api\Data\HamburgerExtensionInterface|null
     */
    public function getExtensionAttributes();
 
    /**
     * @param \VinaiKopp\Kitchen\Api\Data\HamburgerExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(HamburgerExtensionInterface $extensionAttributes);
}
