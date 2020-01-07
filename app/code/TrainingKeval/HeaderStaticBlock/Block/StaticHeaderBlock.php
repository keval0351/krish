<?php


namespace TrainingKeval\HeaderStaticBlock\Block;


use Magento\Framework\View\Element\Template;

class StaticHeaderBlock extends Template
{
    protected $_customerSession;

    public function __construct(
        \Magento\Customer\Model\SessionFactory $customerSession,
        Template\Context $context, array $data = [])
    {
        $this->_customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getHeaderContent() {
        $customerData = $this->_customerSession->create();
        if($customerData->isLoggedIn()) {
            return 'HeaderContentAfterLogin';
        } else {
            return 'HeaderContentBeforeLogin';
        }
    }
}