<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午10:06
 */

$application = $di->get('config')->application;
$loader = new \Phalcon\Loader();
$loader->registerDirs([
   $application->controllerDir,
   $application->modelDir,
   $application->validationDir,
   $application->moduleDir
])->registerNamespaces([

    "Cms\\Controllers"            => $application->controllerDir,
    "Cms\\Models"                 => $application->modelDir,
    "Cms\\Validation"             => $application->validationDir,
    "Cms\\Modules"                => $application->moduleDir
])->register();