<?php
namespace Ezest\Practice\Model;
use Ezest\Practice\Api\PracticeInterface;
 
class PracticeDetail implements PracticeInterface
{
    private $_practiceModel;
    private $_request;
    private $_practiceHelper;
    /**
     * @param Action\Context $context
     */
    public function __construct(\Ezest\Practice\Model\Practice $practiceModel,\Ezest\Practice\Helper\Data $practiceHelper)
    {
        $this->_practiceModel = $practiceModel;
        $this->_practiceHelper = $practiceHelper;
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $id Users name.
     * @return jsonobject $data Greeting message with users name.
     */
    public function getPracticeDetails($id) {
        $load = $this->_practiceModel->load($id);
        return $load->getData();
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param 
     * @return jsonobject $data
     */
    public function getPracticeList() {
        $load = $this->_practiceModel->getCollection();
        return $load->getData();
    }
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string[] the array of string to save
     * @return jsonobject $data 
     */
    public function savePractice($pct) {

        $responseArray = array();
        try{
        $this->_practiceModel->setData($pct);
        $this->_practiceModel->save();
        $responseArray[]['practice_details'] = $this->getPracticeDetails($this->_practiceModel->getId());  
        $this->_practiceHelper->sendCustomEmail($this->_practiceModel->getId()); 
        $responseArray[]['messages'] = $this->_practiceHelper->getSuccessMessage(4000);
        }catch(\Exception $e){
            $responseArray[]['messages'] = $this->_practiceHelper->getMessage('', '0', array(), $e->getMessage());
        }
        return $responseArray;
    }
     /**
     * Returns greeting message to user
     *
     * @api
     * @param int $id
     * @param string $pct
     * @return jsonobject $data 
     */
    public function updatePractice($id,$pct) {
        //$load = $this->_practiceModel->getCollection();
        //return $load->getData();
        //print_r($pcts); exit;
    }
    

}