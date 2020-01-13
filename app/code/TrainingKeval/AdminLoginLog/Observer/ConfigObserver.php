<?php


namespace TrainingKeval\AdminLoginLog\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Psr\Log\LoggerInterface as Logger;

class ConfigObserver implements ObserverInterface
{
    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(
        Logger $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(EventObserver $observer)
    {
        //$this->logger->info($observer->getWebsite());
        //$this->logger->info($observer->getStore());
        $myEventData = $observer->getData('admin_system_config_changed_section_general');
        var_dump($observer->getData());
    }
}