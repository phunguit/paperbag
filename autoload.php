<?php

error_reporting(E_ALL);

include __DIR__ . '/vendor/autoload.php';

/**
 * Read the configuration
 */
$config = include __DIR__ . '/app/config/config.php';

/**
 * Read auto-loader
 */
include __DIR__ . '/app/config/loader.php';

/**
 * Read services
 */
include __DIR__ . '/app/config/services.php';
