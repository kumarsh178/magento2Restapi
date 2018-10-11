<?php
 
namespace VinaiKopp\Kitchen\Api\Data;
 
use Magento\Framework\Api\SearchResultsInterface;
 
interface HamburgerSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \VinaiKopp\Kitchen\Api\Data\HamburgerInterface[]
     */
    public function getItems();
 
    /**
     * @param \VinaiKopp\Kitchen\Api\Data\HamburgerInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}