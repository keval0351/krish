<?php

namespace TrainingKeval\FeedBack\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use TrainingKeval\FeedBack\Model\FeedBackFactory;
use TrainingKeval\FeedBack\Model\FeedBackRepository;

class Save extends Action
{
    protected $feedbackFactory;
    /**
     * @var FeedBackRepository
     */
    protected $feedbackRepository;

    private static $_siteVerifyUrl = "https://www.google.com/recaptcha/api/siteverify?";
    private $_secretKey;
    private static $_version = "php_1.0";

    public function __construct(
        FeedbackFactory $feedbackFactory,
        FeedBackRepository $feedbackRepository,
        Context $context
    ) {
        parent::__construct($context);
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackRepository = $feedbackRepository;
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
        $post = $this->getRequest()->getParams();
        $remoteAddress = new \Magento\Framework\Http\PhpEnvironment\RemoteAddress($this->getRequest());
        $visitorIp = $remoteAddress->getRemoteAddress();

        $secretKey = '6LeMp8sUAAAAAOHbzEZWo5fxztS2fIVVtsZGYatE';
        $response = null;
        $path = 'https://www.google.com/recaptcha/api/siteverify?';
        $response = $post["g-recaptcha-response"];
        $remoteIp = $visitorIp;
        $url = $path."secret=".$secretKey."&response=".$response."&remoteip=".$remoteIp;
        $response = file_get_contents($url);
        $answers = json_decode($response, true);
        if(trim($answers['success']) == true) {
            unset($post['form_key']);
            $feedback = $this->feedbackFactory->create();

            $data = $this->getRequest()->getPostValue();
            $feedback->setData($data);
            if ($this->feedbackRepository->saveFeedback($feedback)) {
                $this->messageManager->addSuccessMessage(__('Thank You For Your FeedBack ! We Will Contact You Soon.'));
            } else {
                $this->messageManager->addErrorMessage(__('Invalid data error, please try again.'));
            }
        } else {
            $this->messageManager->addErrorMessage(__('Invalid Captcha Error! Please Try Again.'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/');
        return $resultRedirect;
    }
}
