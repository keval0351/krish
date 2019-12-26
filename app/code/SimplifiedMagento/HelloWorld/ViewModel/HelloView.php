<?php


namespace SimplifiedMagento\HelloWorld\ViewModel;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class HelloView implements ArgumentInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $product;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
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