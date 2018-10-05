<?php

namespace Ezest\Practice\Model\ResourceModel\Practice;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ezest\Practice\Model\Practice', 'Ezest\Practice\Model\ResourceModel\Practice');
        $this->_map['fields']['page_id'] = 'main_table.page_id';
    }

}
?>