<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午9:58
 */

define('ROOT_PATH', __DIR__ . '/../');
define('APP_PATH', ROOT_PATH . 'apps/');

//开启调试模式
ini_set('display_errors', true);
require APP_PATH . 'config/router.php';
require APP_PATH . 'config/service.php';
require APP_PATH . 'config/loader.php';

require ROOT_PATH . 'vendor/autoload.php';

$application = new \Phalcon\Mvc\Application($di);
$application->registerModules([

    'backend' => [
        'className' => 'Cms\\Modules\\BackendModule',
        'path'      => APP_PATH . 'modules/BackendModule.php'
    ]
]);


$application->handle()->send();