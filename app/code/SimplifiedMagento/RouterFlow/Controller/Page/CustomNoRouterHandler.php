<?php


namespace SimplifiedMagento\RouterFlow\Controller\Page;


class CustomNoRouterHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{

    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        $request->setRouteName("norouterfound")->setControllerName("page")->setActionName("customnoroutefound");
        return true;
    }
}