<?php


namespace SimplifiedMagento\FirstModule\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\FirstModule\Api\PencilInterface;
//use Magento\Catalog\Api\ProductRepositoryInterface;
use SimplifiedMagento\FirstModule\Model\PencilFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\App\Request\Http;
use SimplifiedMagento\FirstModule\Model\HeavyService;

class HelloWorld extends \Magento\Framework\App\Action\Action
{
    protected $pencilInterface;
    //protected $productRepository;
    protected $productFactory;
    protected $pencilFactory;
    protected $_eventManager;
    protected $http;
    protected $heavyService;

    function __construct(Context $context,
                         HeavyService $heavyService,
                         Http $http,
                         ManagerInterface $_eventManager,
                         ProductFactory $productFactory,
                         PencilFactory $pencilFactory,
                         PencilInterface $pencilInterface)
    {
        $this->pencilInterface = $pencilInterface;
        $this->http = $http;
        $this->heavyService = $heavyService;
        $this->_eventManager = $_eventManager;
        //$this->productRepository = $productRepository;
        $this->pencilFactory = $pencilFactory;
        $this->productFactory = $productFactory;

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
//        $product = $this->productFactory->create()->load(1);
//        $product->setName('Macbook');
//        $productName = $product->getName();
//        echo $productName;

//        $pencil = $this->pencilFactory->create(array("name" => "Kadia", "school" => "SEMCOM"));
//        var_dump($pencil);

//        echo $this->pencilInterface->getPencilType();
//        echo '<br />';

//        echo get_class($this->productRepository);

        // // Do not use object Manager like below
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $pencil = $objectManager->create('SimplifiedMagento\FirstModule\Model\Pencil');
//        var_dump($pencil);

//        $student = $objectManager->create('SimplifiedMagento\FirstModule\Model\Student');
//        var_dump($student);

//        $message = new \Magento\Framework\DataObject(array("greeting"=>"Good Morning"));
//        $this->_eventManager->dispatch('custom_event', ['greeting'=>$message]);
//        echo $message->getGreeting();
        $id = $this->http->getParam('id',0);
        if($id == 1){
            $this->heavyService->getPrintHeavyServiceMessage();
        } else {
            echo "Heavy Service Not Used!";
        }
    }
}