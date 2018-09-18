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
     * @param
     * @return string the total list in json format 
     */
    public function getPracticeList();
     /** 
     * Returns greeting message to user
     *
     * @api
     * @param string[] the array of string to save
     * @return string  the message
     */
    public function savePractice($pct);
}