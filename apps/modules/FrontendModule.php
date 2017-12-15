<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 下午2:15
 */

namespace Cms\modules;


use Phalcon\Loader;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\View;

class FrontendModule implements ModuleDefinitionInterface
{
    public function registerAutoloaders(\Phalcon\DiInterface $di = null)
    {
          $loader = new Loader();
          $loader->registerNamespaces([
             'Cms\\Controllers\\Frontend' => APP_PATH . 'controllers/frontend/'
          ])->register();
    }

    public function registerServices(\Phalcon\DiInterface $di)
    {
          $di->setShared('dispatcher', function (){

              $dispatcher = new Dispatcher();
              $dispatcher->setDefaultNamespace('Cms\\Controllers\\Frontend');
              return $dispatcher;
          });

          $di->setShared('view', function (){

              $view = new View();
              $view->setViewsDir(APP_PATH . 'views/frontend');
              return $view;
          });
    }

}