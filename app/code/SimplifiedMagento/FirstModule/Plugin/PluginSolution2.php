<?php


namespace SimplifiedMagento\FirstModule\Plugin;


class PluginSolution2
{
//    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name){
//        return 'Before Plugin '.$name.' Sort Order 20 </br>';
//    }
//
//    public function afterGetName(\Magento\Catalog\Model\Product $subject, $name){
//        return $name.' After Plugin '.' Sort Order 20 </br>';
//    }

    public function aroundExecute(\SimplifiedMagento\FirstModule\Controller\Page\HelloWorld $subject, callable $proceed){
        echo 'Before Plugin '.' Sort Order 20 </br>';
        $name = $proceed();
        echo $name;
        echo ' After Plugin'.' Sort Order 20 </br>';
    }
}