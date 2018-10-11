<?php
namespace Webkul\Hello\Api;
class TestRepositoryInterface
{
	 /**
     * Create or update a data
     */
    public function save(\Webkul\Hello\Api\Data\TestInterface $test);
 
    public function getById($testId);
 
    /**
     * Delete test.
     */
    public function delete(\Webkul\Hello\Api\Data\TestInterface $test);
 
    /**
     * Delete test by ID.
     */
    public function deleteById($testId);
}