<?php

namespace TrainingKeval\FeedBack\Controller\Adminhtml\Customer;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use TrainingKeval\FeedBack\Model\FeedBack;

class Response extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;
    /**
     * @var Registry
     */
    protected $registry = null;
    /**
     * @var FeedBack
     */
    protected $feedback;

    /**
     * @var Session
     */
    protected $authSession;

    public function __construct(
        PageFactory $pageFactory,
        Registry $registry,
        FeedBack $feedback,
        Action\Context $context
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->registry = $registry;
        $this->feedback = $feedback;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('TrainingKeval_FeedBack::parent');
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
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}
