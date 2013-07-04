<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('LINE_BREAK', '<br />');

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');

// creating Request object
try {
    $request = new Request();
    $request->url_elements = array();
} 
catch(Exception $e){
    echo $e->getMessage(),LINE_BREAK;
    exit;
}

// reading the url elements into the Request object
if(isset($_SERVER['PATH_INFO'])) {
  $request->url_elements = explode('/', $_SERVER['PATH_INFO']);
  //var_dump($request->url_elements);
}

// figure out the method 
// and if it's POST(or PUT) grab the incoming data
$request->method = $_SERVER['REQUEST_METHOD'];

switch($request->method) {
  case 'GET':
    $request->parameters = $_GET;
    var_dump($request->parameters);
    break;
  case 'POST':
  case 'PUT':
    //$request->parameters = file_get_contents('php://input');
    $request->parameters = $_POST;
    break;
  case 'DELETE':
  default:
    // we won't set any parameters in these cases
    $request->parameters = array();
}

 //var_dump($request->parameters);
        //echo LINE_BREAK;
try{
    $controller_router = new ControllerRouter();
    $controller_router->route($request);
    exit;
}
catch(Exception $e){
    echo $e->getMessage(),LINE_BREAK;
}







//echo json_encode($response).LINE_BREAK;