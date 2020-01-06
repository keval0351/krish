<?php

namespace TrainingKeval\FeedBack\Controller\Adminhtml\Customer;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use TrainingKeval\FeedBack\Model\FeedBack;

class Edit extends Action
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
        $id = $this->getRequest()->getParam('id');
        $model = $this->feedback;
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This FeedBack does not exist.'));
                $result = $this->resultRedirectFactory->create();
                return $result->setPath('feedback/customer/index');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->registry->register('feedback', $model);

        $resultPage = $this->pageFactory->create();
        if ($id) {
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        } else {
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }
        return $resultPage;
    }
}
