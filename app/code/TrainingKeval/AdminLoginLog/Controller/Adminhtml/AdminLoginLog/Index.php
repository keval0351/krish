<?php


namespace TrainingKeval\AdminLoginLog\Controller\Adminhtml\AdminLoginLog;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
class Index extends Action
{
    protected $pageFactory;
    /**
     * Index constructor.
     * @param PageFactory $pageFactory
     * @param Action\Context $context
     */
    public function __construct(
        PageFactory $pageFactory,
        Action\Context $context
    ) {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }
    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}