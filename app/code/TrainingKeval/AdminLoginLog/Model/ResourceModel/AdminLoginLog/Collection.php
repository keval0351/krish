<?php


namespace TrainingKeval\AdminLoginLog\Model\ResourceModel\AdminLoginLog;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Psr\Log\LoggerInterface as Logger;
class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    /**
     * Collection constructor.
     * @param EntityFactory $entityFactory
     * @param Logger $logger
     * @param FetchStrategy $fetchStrategy
     * @param EventManager $eventManager
     * @param string $mainTable
     * @param null $resourceModel
     * @param null $identifierName
     * @param null $connectionName
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function __construct(EntityFactory $entityFactory, Logger $logger, FetchStrategy $fetchStrategy, EventManager $eventManager, $mainTable = 'admin_user_session', $resourceModel = null, $identifierName = null, $connectionName = null)
    {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel, $identifierName, $connectionName);
    }
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getConnection()->describeTable($this->getMainTable());
        $this->getSelect()->joinInner(
            ['secondTable' => $this->getTable('admin_user')],
            "main_table.user_id = secondTable.user_id"
        );
        $this->addFilterToMap('username', 'username');
        return $this;
    }
}