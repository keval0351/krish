<?php


namespace TrainingKeval\FeedBack\Block\Adminhtml\Block\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResponseFeedBackButton implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Response'),
            'sort_order' => 40,
            'class' => 'save primary'
        ];
    }
}