<?php

$config = new \Phalcon\Config(array(

    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'paperbag',
        'password' => '3hfOxD5aShM8SMD',
        'dbname' => 'paperbag'
    ),

    'application' => array(
        'baseUri' => '/',
        'language' => 'en',
        'cacheDir' => __DIR__ . '/../../app/cache/',
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'imagesDir' => __DIR__ . '/../../img/',
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

if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'infrakreasi.com') !== false) {
    $config->database->host = 'localhost';
    $config->database->username = 'infrakre_pperbag';
    $config->database->password = '3hfOxD5aShM8SMD';
    $config->database->dbname = 'infrakre_paperbag';
    $config->application->baseUri = '/fjbgaming/';
}
return $config;
