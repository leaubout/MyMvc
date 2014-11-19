<?php

// Redéfinition de la constante globale DIRECTORY_SEPARATOR
defined('DS') || define('DS', DIRECTORY_SEPARATOR);

// /var/www/project/src ROOT_PATH ou SRC_PATH
defined('ROOT_PATH') || define('ROOT_PATH', dirname(dirname(__FILE__)));

// /var/www/project/src/application
defined('APP_PATH') || define('APP_PATH', ROOT_PATH . DS . 'application');

// var/www/project/src/library
defined('LIB_PATH') || define('LIB_PATH', ROOT_PATH . DS . 'library');

/* nouveau */
require_once ROOT_PATH. "/vendor/autoload.php";


$application = new MyMVC\Application;
$application->run();
