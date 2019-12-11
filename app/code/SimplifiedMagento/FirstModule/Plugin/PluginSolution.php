<?php


namespace SimplifiedMagento\FirstModule\Plugin;


class PluginSolution
{
//    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name){
//        return 'Before Plugin '.$name.' Sort Order 10 </br>';
//    }
//
//    public function afterGetName(\Magento\Catalog\Model\Product $subject, $name){
//        return $name.' After Plugin '.' Sort Order 10 </br>';
//    }

    public function aroundExecute(\SimplifiedMagento\FirstModule\Controller\Page\HelloWorld $subject, callable $proceed){
        echo 'Before Plugin '.' Sort Order 10 </br>';
        $name = $proceed();
        echo $name;
        echo ' After Plugin'.' Sort Order 10 </br>';
    }
}