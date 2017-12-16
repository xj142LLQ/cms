<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午10:06
 */

$application = $di->get('config')->application;
$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    "Cms\\Controllers"     => $application->controllerDir,
    "Cms\\Models"          => $application->modelDir,
    "Cms\\Validation"      => $application->validationDir,
    "Cms\\Modules"         => $application->moduleDir,
    "Cms\\Base"            => $application->baseDir,
    "Cms\\Library"         => $application->libraryDir,
    "Cms\\Logic"           => $application->logicDir,
    "Cms\\Entity"          => $application->entityDir
])->register();