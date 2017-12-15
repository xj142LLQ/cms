<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午10:06
 */

$router = new \Phalcon\Mvc\Router();

//添加路由
$router->add('/admin-backend/:controller/:action', [
      'module'     => 'backend',
      'controller' => 1,
      'action'     => 2
]);

