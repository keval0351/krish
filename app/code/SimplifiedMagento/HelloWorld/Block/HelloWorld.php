<?php


namespace SimplifiedMagento\HelloWorld\Block;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;

class HelloWorld extends \Magento\Framework\View\Element\Template
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $product;

    public function __construct(ProductRepositoryInterface $productRepository, Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->product = $productRepository;
    }

    public function getHelloWorld(){
        return "This Message is from Block!";
    }

    public function getHelloWorldArray(){
        $array = ["Good", "Perfect", "Excellent"];
        return $array;
    }

    public function getProductName(){
        $product = $this->product->get('24-UG07');
        return $product->getName();
    }
}