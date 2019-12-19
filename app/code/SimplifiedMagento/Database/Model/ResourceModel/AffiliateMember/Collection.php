<?php

namespace SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'SimplifiedMagento\Database\Model\AffiliateMember',
            'SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember'
        );
    }
}