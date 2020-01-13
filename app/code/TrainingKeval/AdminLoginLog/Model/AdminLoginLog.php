<?php


namespace TrainingKeval\AdminLoginLog\Model;

use Magento\Framework\Model\AbstractModel;
use TrainingKeval\AdminLoginLog\Model\ResourceModel\AdminLoginLog as AdminLoginLogResource;

class AdminLoginLog extends AbstractModel
{
    protected $_idFieldName = 'id';
    protected function _construct()
    {
        $this->_init(AdminLoginLogResource::class);
    }
}