<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
date_default_timezone_set('Europe/Warsaw');
// directory setup and class loading
set_include_path('.' . PATH_SEPARATOR . '../library/'
     . PATH_SEPARATOR . '../application/models'
     . PATH_SEPARATOR . get_include_path());
include "Zend/Loader.php";
Zend_Loader::registerAutoload();

$config = array(
    'host'     => 'infomaster.nazwa.pl',
    'username' => 'infomaster_10',
    'password' => 'HAslo!@#123',
    'dbname'   => 'infomaster_10'
);

$registry = Zend_Registry::getInstance();
$registry->set('config', $config);

// setup database
$db = Zend_Db::factory('PDO_MYSQL',$config);
$registry->set('db', $db);
Zend_Db_Table::setDefaultAdapter($db);

//$registry->set('db', $db);


//$translate = new Zend_Translate('Array', '../language/polish.php', 'pl_PL'); 
//$translate->setLocale('pl_PL');
//Zend_Registry::set('Zend_Translate', $translate);   

//$config = new Zend_Config_Ini('../application/config.ini', 'general');
//$registry = Zend_Registry::getInstance();
//$registry->set('config', $config);

// setup controller
$frontController = Zend_Controller_Front::getInstance();
$frontController->throwExceptions(true);

$frontController->setControllerDirectory('../application/controllers');
Zend_Layout::startMvc(array('layoutPath'=>'../application/layouts'));
// run!
$frontController->dispatch();