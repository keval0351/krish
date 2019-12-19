<?php


namespace SimplifiedMagento\Database\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\Database\Model\AffiliateMemberFactory;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember;

class index extends Action
{
    protected $affiliateMemberFactory;

    public function __construct(Context $context, AffiliateMemberFactory $affiliateMemberFactory)
    {
        parent::__construct($context);
        $this->affiliateMemberFactory = $affiliateMemberFactory;
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
        $affiliateMember = $this->affiliateMemberFactory->create();
        $collection = $affiliateMember->getCollection()
            ->addFieldToSelect(['name','status'])
            ->addFieldToFilter('name',array('SOG','keval'));

        foreach($collection as $item){
            print_r($item->getData());
        }

//        $member = $affiliateMember->load('3');
//        var_dump($member->getData());
//        $member->setAddress('27, SOG Kingdom');
//        $member->save();
//        var_dump($member->getData());
//        $affiliateMember->addData(['name'=>'Riki','address'=>'310 sarita complex','status'=>1,'phone_number'=>'9913570607']);
//        $affiliateMember->save();
//        $member = $affiliateMember->load('4');
//        $member->delete();
    }
}