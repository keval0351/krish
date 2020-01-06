<?php


namespace TrainingKeval\FeedBack\Block\Adminhtml\Block\Edit;

use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
class Response extends Generic implements ButtonProviderInterface
{
    protected $request;
    protected $url;
    protected $authSession;
    public function __construct(\Magento\Backend\Block\Widget\Context $context, UrlInterface $url, Registry $registry, \Magento\Framework\App\Request\Http $request)
    {
        $this->url = $url;
        $this->request = $request;
        parent::__construct($context, $registry);
    }
    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Give Response'),
            'sort_order' => 50,
            'class' => 'save primary',
            'url' => $this->url->getUrl('*/*/response', ['id' => $this->getId()]),
        ];
    }
    public function getId()
    {
        $this->request->getParams();
        return $this->request->getParam('id');
    }
}
