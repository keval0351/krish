<?php


namespace TrainingKeval\AdminLoginLog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

class AddToCartObserver implements ObserverInterface
{
    /**
     * @var Logger
     */
    protected $_request;
    protected $_helper;
    protected $cart;
    public function __construct(\Magento\Framework\App\RequestInterface $request,
                                \Magento\Checkout\Model\Cart $cart,
                                RemoteAddress $remoteAddress)
    {
        $this->_request = $request;
        $this->cart=  $cart;
        $this->remoteAddress = $remoteAddress;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $writer = new \Zend\Log\Writer\Stream(BP.'/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $item = $observer->getEvent()->getData('quote_item');
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        $item->getProduct()->setIsSuperMode(true);
        $pid = $item->getProductId();
        $pName =  $item->getProduct()->getSku();
        $ipaddress = $this->remoteAddress->getRemoteAddress();
        $logger->info("item name ".$pName." =====pid ".$pid ." Ip Address = ".$ipaddress."");
    }
}