<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 下午12:24
 */

namespace Cms\modules;


use Phalcon\Loader;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;

class BackendModule implements ModuleDefinitionInterface
{
    public function registerAutoloaders(\Phalcon\DiInterface $di = null)
    {
        $loader = new Loader();
        $loader->registerNamespaces([
           'Cms\\Controllers\\Backend' => APP_PATH . 'controllers/backend/'
        ])->register();

    }

    public function registerServices(\Phalcon\DiInterface $di)
    {
        $di->setShared('dispatcher', function (){

            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Cms\\Controllers\\Backend');
            return $dispatcher;
        });

        $di->setShared('view', function (){

            $view = new View();
            $view->setViewsDir(APP_PATH . 'views/backend/');
            return $view;
        });
    }

}