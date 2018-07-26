<?php
namespace Ezest\Practice\Api;
 
interface PracticeInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param int $id practice id.
     * @return string 
     */
    public function getPracticeDetails($id);

     /** 
     * Returns greeting message to user
     *
     * @api
     * @param.
     * @return string  
     */
    public function getPracticeList();
     /** 
     * Returns greeting message to user
     *
     * @api
     * @param string[] the array of string to save
     * @return string  
     */
    public function savePractice($pct);
    /** 
     * Returns greeting message to user
     *
     * @api
     * @param string[] the array of string to save
     * @return string  
     */
    public function updatePractice($pcts);
    /** 
     * Returns greeting message to user
     *
     * @api
     * @param string[] the array of string to save
     * @return string  
     */
    public function addPractice($pctss);
}