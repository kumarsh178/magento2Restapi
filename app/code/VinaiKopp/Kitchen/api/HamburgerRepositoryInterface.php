<?php
namespace VinaiKopp\Kitchen\Api;
use Magento\Framework\api\SearchCriteriaInterface;
use VinaiKopp\Kitchen\api\Data\HamburgerInterface;

class HamburgerRepositoryInterface
{

	/**
		*@param int $id
		*@return \VinaiKopp\Kitchen\Api\Data\HamburgerInterface
		*@throws \Magento\Framework\Exception\NoSuchEntityException 
	**/
	public function getById($id);

	/**
		*@param \VinaiKopp\Kitchen\Api\Data\HamburgerInterface $hamburger
		*@return \VinaiKopp\Kitchen\Api\Data\HamburgerInterface
	**/
	public function save(HamburgerInterface $hamburger);
	
	/**
		*@param \VinaiKopp\Kitchen\Api\Data\HamburgerInterface $hamburger
		*@return \VinaiKopp\Kitchen\Api\Data\HamburgerInterface
	**/
	public function delete(HamburgerInterface $hamburger);

	/**
		*@param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteriaInterface
		*@return \VinaiKopp\Kitchen\Api\Data\HamburgerSearchResultInterface
	**/
	public function getList(SearchCriteriaInterface $searchCrieteriaInterface);
}