<?php


namespace TrainingKeval\SpouseNameAttribute\Controller\Index;


class Controller extends \Magento\Framework\App\Action\Action
{
    /**
     *
     */
    protected $resultPageFactory;

    protected $customerModel;

    protected $customerResourceFactory;

    public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    \Magento\Customer\Model\Customer $customerModel,
    \Magento\Customer\Model\ResourceModel\CustomerFactory $customerFactory
)  {
    $this->customerModel = $customerModel;
    $this->resultPageFactory = $resultPageFactory;
    $this->customerResourceFactory = $customerFactory;
    parent::__construct($context);
    }

    public function execute()
    {
        $customer = $this->request->getParam('customer');
        $customerNew = $this->customerModel->load($this->customerSession->getCustomer()->getId());
        $customerData = $customerNew->getDataModel();
        $customerData->setCustomAttribute('spouse_name',$customer);
        $customerNew->updateData($customerData);
        $customerResource = $this->customerResourceFactory->create();
        $customerResource->saveAttribute($customerNew, 'spouse_name');
    }
}