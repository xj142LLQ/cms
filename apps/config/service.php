<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午10:05
 */

$di = new \Phalcon\Di\FactoryDefault();
$di->set('router', $router);
$di->setShared('config', function (){
     return new \Phalcon\Config\Adapter\Php(APP_PATH . 'config/config.php');
});

$di->setShared('db', function () use ($di){

    return new \Phalcon\Db\Adapter\Pdo\Mysql([
        "host" => $di->get('config')->database->host,
        'port' => $di->get('config')->database->port,
        'dbname' => $di->get('config')->database->dbname,
        'username' => $di->get('config')->database->username,
        'password' => $di->get('config')->database->password
    ]);
});

