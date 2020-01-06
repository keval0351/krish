<?php

namespace TrainingKeval\FeedBack\Controller\Adminhtml\Customer;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use TrainingKeval\FeedBack\Model\FeedBack;

class Save extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;
    /**
     * @var FeedBack
     */
    protected $model;
    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory,
        PageFactory $pageFactory,
        FeedBack $feedback,
        Action\Context $context
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->model = $feedback;
        $this->resultRedirectFactory = $redirectFactory;
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
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $newData = $data;
            if(isset($newData['response_message']) && !empty($newData['response_message'])) {
                $newData['status'] = 1;
            }
            if (isset($data['entity_id']) && $data['entity_id'] != '') {
                $id = $data['entity_id'];
                $this->model->load($id);
            } else {
                unset($newData['entity_id']);
            }
            $model = $this->model->setData($newData);
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('FeedBack Updated Successfully.'));
                $this->_getSession()->setFormData(false);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }

            return $resultRedirect->setPath('*/*/index');
        }
    }
}
