<?php
// Redéfinition de la constante globale DIRECTORY_SEPARATOR
defined('DS') 
|| define('DS', DIRECTORY_SEPARATOR);

// /var/www/project/src ROOT_PATH ou SRC_PATH
defined('ROOT_PATH')
|| define('ROOT_PATH', dirname(dirname(__FILE__)));

// /var/www/project/src/application
defined('APP_PATH')
|| define('APP_PATH', ROOT_PATH . DS . 'application');

// var/www/project/src/library
defined('LIB_PATH')
|| define('LIB_PATH', ROOT_PATH . DS . 'library');

// Ajout de LIB_PATH dans la variable PATH de PHP (contenant les librairies)
set_include_path(get_include_path() . PATH_SEPARATOR . LIB_PATH);

require_once 'MyMvc/Application.php';

// Création de l'application
$application = new Application();
// et lancement de celle-ci
$application->run();