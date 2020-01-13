<?php


namespace TrainingKeval\AdminLoginLog\Model\Config\Source;

class EventToTrack implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            '0' => 'Select',
            'checkout_cart_product_add_after'=> 'After Add To Cart',
            'sales_quote_remove_item' => 'After Remove Item From Cart'
        ];
    }
}