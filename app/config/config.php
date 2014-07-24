<?php

$config = new \Phalcon\Config(array(

    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'infrakre_pperbag',
        'password' => '3hfOxD5aShM8SMD',
        'dbname' => 'infrakre_paperbag'
    ),

    'application' => array(
        'baseUri' => '/fjbgaming/',
        'language' => 'en',
        'cacheDir' => __DIR__ . '/../../app/cache/',
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'languagesDir' => __DIR__ . '/../../app/languages/',
        'logsDir' => __DIR__ . '/../../app/logs/',
        'modelsDir' => __DIR__ . '/../../app/models/',
        'pluginsDir' => __DIR__ . '/../../app/plugins/',
        'tempDir' => __DIR__ . '/../../app/temp/',
        'viewsDir' => __DIR__ . '/../../app/views/'
    ),

    'currency' => array(
        'symbol' => 'Rp',
        'symbolPlacement' => 'prefix',
        'decimalPoint' => ',',
        'thousandSeparator' => '.',
        'decimals' => 0
    ),

    'image' => array(
        'small' => '100x100',
        'medium' => '210x210',
        'large' => '500x500'
    )
));

if (!isset($_SERVER['HTTP_HOST']) || strpos($_SERVER['HTTP_HOST'], '.dev') !== false) {
    $config->database->host = 'localhost';
    $config->database->username = 'paperbag';
    $config->database->password = '3hfOxD5aShM8SMD';
    $config->database->dbname = 'paperbag';
    $config->application->baseUri = '/';
}
return $config;
