<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('LINE_BREAK', '<br />');

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');

//echo $_SERVER['HTTP_ACCEPT'].LINE_BREAK;
//echo $_SERVER['PATH_INFO'].LINE_BREAK;
//echo $_SERVER['REDIRECT_URL'].LINE_BREAK;

// creating Request object
try {
    $request = new Request();
    $request->init();
    //$request->url_elements = array();
} 
catch(Exception $e){
    echo $e->getMessage(),LINE_BREAK;
    exit;
}

try{
    $controller_router = new ControllerRouter();
    $controller_router->route($request);
}
catch(Exception $e){
    echo $e->getMessage(),LINE_BREAK;
    exit;
}







//echo json_encode($response).LINE_BREAK;