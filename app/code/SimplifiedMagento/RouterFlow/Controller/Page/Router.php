<?php


namespace SimplifiedMagento\RouterFlow\Controller\Page;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ActionFactory;

class Router implements \Magento\Framework\App\RouterInterface
{
    protected $actionFactory;

    /**
     * Match application action by request
     *
     * @param RequestInterface $request
     * @return ActionInterface
     */
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        // TODO: Implement match() method.
        $path = trim($request->getPathInfo(),'/');
        $paths = explode("-",$path);
        $request->setModuleName($paths[0])->setControllerName($paths[1])->setActionName($paths[2]);
        return $this->actionFactory->create('\Magento\Framework\App\Action\Forward',['request'=>$request]);
    }
}