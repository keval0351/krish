<?php


namespace SimplifiedMagento\RouterFlow\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\RedirectFactory;

class ResponceType extends Action
{
    protected $pageFactory;
    protected $jsonFactory;
    protected $raw;
    protected $forwardFactory;
    protected $redirectFactory;

    public function __construct(Context $context, PageFactory $pageFactory,
                                JsonFactory $jsonFactory, Raw $raw, ForwardFactory $forwardFactory,
                                RedirectFactory $redirectFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->jsonFactory = $jsonFactory;
        $this->raw = $raw;
        $this->forwardFactory = $forwardFactory;
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
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
        //return $this->pageFactory->create();
        return $this->jsonFactory->create()->setData(['name'=>'test','age'=>30]);
        //return $this->raw->setContents('Hello World!');
        $result = $this->forwardFactory->create();
        $result->setModule('norouterfound')->setController('page')->forward("customnoroutefound");
        return $result;
//        $result = $this->redirectFactory->create();
//        $result->setPath('norouterfound/page/customnoroutefound');
//        return $result;
    }
}