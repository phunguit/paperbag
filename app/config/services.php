<?php

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\DI\FactoryDefault;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as LogAdapter;
use Phalcon\Logger\Formatter\Line as LogFormatter;
use Phalcon\Mvc\Model\MetaData\Memory as MetaDataAdapter;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {
    $view = new View();
    $view->setViewsDir($config->application->viewsDir);
    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {
                $volt = new VoltEngine($view, $di);
                $volt->setOptions(array(
                    'compiledPath' => $config->application->cacheDir,
                    'compileAlways' => true,
                    'compiledSeparator' => '_'
                ));
                return $volt;
            }
    ));
    return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    $db = new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ));
    $eventsManager = new EventsManager();
    $logger = new LogAdapter($config->application->logsDir . date('Y-m-d') . '-db.log');
    $logger->setFormatter(new LogFormatter('[%date%] - %message%'));
    $eventsManager->attach('db', function ($event, $db) use ($logger) {
        if ($event->getType() == 'beforeQuery') {
            $logger->log($db->getSQLStatement(), Logger::INFO);
        }
    });
    $db->setEventsManager($eventsManager);
    return $db;
}, true);

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () use ($config) {
    return new MetaDataAdapter(array(
        'metaDataDir' => $config->application->tempDir
    ));
}, true);

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
}, true);

/**
 * Provide logging services for application
 */
$di->set('logger', function () use ($config) {
    $logger = new LogAdapter($config->application->logsDir . date('Y-m-d') . '.log');
    $logger->setFormatter(new LogFormatter('[%date%] - %message%'));
    return $logger;
}, true);

/**
 * Enables message translation service using language plugin
 */
$di->set('t', function () use ($config) {
    $language = new Language();
    $language->setLanguage($config->application->language);
    $language->setLanguagesDir($config->application->languagesDir);
    return $language;
}, true);

/**
 * Provides number format utility functions
 */
$di->set('f', function () use ($config) {
    $format = new Format();
    $format->setSymbol($config->currency->symbol);
    $format->setSymbolPlacement($config->currency->symbolPlacement);
    $format->setDecimalPoint($config->currency->decimalPoint);
    $format->setThousandSeparator($config->currency->thousandSeparator);
    $format->setDecimals($config->currency->decimals);
    return $format;
}, true);

/**
 * The image component generates all resizable image urls after creating its cache file
 */
$di->set('img', function () use ($config) {
    $image = new Image($config->image);
    $image->setBaseUri($config->application->baseUri . 'img/');
    $image->setImagesDir($config->application->imagesDir);
    return $image;
}, true);
