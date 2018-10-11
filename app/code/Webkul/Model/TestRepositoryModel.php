<?php 
namespace Webkul\Hello\Model; 
class TestRepositoryModel implements \Webkul\Hello\Api\TestRepositoryInterface
{
 
    /**
     * Save test data.
     */
    public function save(\Webkul\Hello\Api\Data\TestInterface $test)
    {
        //your code
    }
    /**
     * Retrieve test data.
     */
    public function getById($testId)
    {
        //your code
    }
 
    /**
     * Delete test.
     */
    public function delete(\Webkul\Hello\Api\Data\TestInterface $test)
    {
        //your code
    }
 
    /**
     * Delete test by test ID.
     */
    public function deleteById($testId)
    {
        //your code
    }
}