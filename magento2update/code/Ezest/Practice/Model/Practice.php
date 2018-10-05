<?php
namespace Ezest\Practice\Model;

class Practice extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ezest\Practice\Model\ResourceModel\Practice');
    }
}
?>