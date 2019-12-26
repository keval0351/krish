<?php


namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMember;

class Edit extends Action
{
    protected $pageFactory;
    protected $affiliateMember;
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;


    public function __construct(AffiliateMember $affiliateMember,
                                   Registry $registry,
                                   PageFactory $pageFactory,
                                   Action\Context $context)
    {
        $this->pageFactory = $pageFactory;
        $this->affiliateMember = $affiliateMember;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('SimplifiedMagento_CustomAdmin::parent');
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
        $model = $this->affiliateMember;
        if($id){
            $model->load($id);
            if(!$model->getId()){
                $this->messageManager->addErrorMessage(__('This member does not exist;'));
                $result = $this->resultRedirectFactory->create();
                return $result->setPath('affiliate/member/index');
            }
        }
        $data = $this->_getSession()->getFormData(true);
        if(!empty($data)){
            $model->setData($data);
        }

        $this->_coreRegistry->register("member", $model);
        /**
         * @var \Magento\Backend\Model\View\Result\Page $resultPage
         */
        $resultPage = $this->pageFactory->create();

        $msg = $id?__("Edit Member"):__("Add a New Member");

        $resultPage->addBreadcrumb($msg,$msg);

        if($id){
            $resultPage->getConfig()->getTitle()->prepend("Edit");
        }else{
            $resultPage->getConfig()->getTitle()->prepend("Add");
        }
        return $resultPage;
    }
}