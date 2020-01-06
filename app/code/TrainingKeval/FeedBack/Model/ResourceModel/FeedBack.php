<?php


namespace TrainingKeval\FeedBack\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class FeedBack extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('feedback', 'entity_id');
    }
}