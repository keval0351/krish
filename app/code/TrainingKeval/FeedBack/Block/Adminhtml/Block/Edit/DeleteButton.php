<?php

namespace TrainingKeval\FeedBack\Block\Adminhtml\Block\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends Generic implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];

        if ($this->getId()) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'sort_order' => 20,
                'on_click' => 'deleteConfirm(\'' . __('Are You Sure You Want To Delete This FeedBack?') . '\',\'' . $this->getDeleteUrl() . '\')',
            ];
        }

        return $data;
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getId()]);
    }
}
