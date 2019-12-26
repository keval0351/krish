<?php


namespace SimplifiedMagento\CustomAdmin\Controller\Index;



use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{
    private $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig, Context $context)
    {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        echo $this->scopeConfig->getValue('Customoption/Customgroup/date_fields_order');
    }
}