<?php
/**
 * Created by PhpStorm.
 * User: llq
 * Date: 17-12-15
 * Time: 上午10:05
 */

return [

    'database' => [
        'host' => getenv('CMS_DB_HOST'),
        'port' => getenv('CMS_DB_PORT'),
        'dbname' => getenv('CMS_DB_NAME'),
        'username' => getenv('CMS_DB_USERNAME'),
        'password' => getenv('CMS_DB_PASSWORD')
    ],

    'application' => [
        'baseDir'         => APP_PATH . 'base',
        'controllerDir'   => APP_PATH . 'controllers',
        'modelDir'        => APP_PATH . 'models',
        'validationDir'   => APP_PATH . 'validation',
        'moduleDir'       => APP_PATH . 'modules',
        'libraryDir'      => APP_PATH . 'library',
        'logicDir'        => APP_PATH . 'logic',
        'entityDir'       => APP_PATH . 'entity'
    ]
];