<?php

namespace TrainingKeval\FeedBack\Block\Adminhtml\Block\Edit;

use Magento\Framework\Registry;
use TrainingKeval\FeedBack\Model\FeedBack;

class Generic
{
    protected $urlBuilder;
    protected $registry;

    public function __construct(\Magento\Backend\Block\Widget\Context $context, Registry $registry)
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId()
    {
        /** @var FeedBack $feedback */
        $feedback = $this->registry->registry('customer');
        return $feedback ? $feedback->getId() : null;
    }

    public function getUrl($route = '', $param = [])
    {
        return $this->urlBuilder->getUrl($route, $param);
    }
}
