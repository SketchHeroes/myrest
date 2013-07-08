<?php

require_once (ROOT . DS . 'config' . DS . 'config.php');
//require_once (ROOT . DS . 'library' . DS . 'shared.php');

function __autoload($classname) {
    //echo "Trying to include class ".$classname.LINE_BREAK;
    
    if (file_exists(ROOT . DS . 'library' . DS . strtolower($classname) . '.php')) {
            require_once(ROOT . DS . 'library' . DS . strtolower($classname) . '.php');
    } else if (file_exists(ROOT . DS . 'apps' . DS . 'controllers' . DS . strtolower($classname) . '.php')) {
            require_once(ROOT . DS . 'apps' . DS . 'controllers' . DS . strtolower($classname) . '.php');
    } else if (file_exists(ROOT . DS . 'apps' . DS . 'models' . DS . strtolower($classname) . '.php')) {
            require_once(ROOT . DS . 'apps' . DS . 'models' . DS . strtolower($classname) . '.php');
    } else {
            //echo ''.ROOT . DS . 'library' . DS . strtolower($classname) . '.php';
            throw new Exception("Unable to load class $classname.php".LINE_BREAK);
    }
}

if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
