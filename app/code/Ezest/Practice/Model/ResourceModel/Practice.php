<?php
namespace Ezest\Practice\Model\ResourceModel;

class Practice extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('practice', 'entity_id');
    }
}
?>