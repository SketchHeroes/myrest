<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('LINE_BREAK', '<br />');

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');

// initialise the request object and store the requested URL
try {
    $request = new Request();
    $request->url_elements = array();
} 
catch(Exception $e){
    echo $e->getMessage(), "\n";
}


//echo $_SERVER['REQUEST_METHOD'].LINE_BREAK;

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

// route the request
if($request->url_elements) {
  $controller_name = ucfirst($request->url_elements[1]) . 'Controller';
  try {
    $controller = new $controller_name();
    $action_name = ucfirst($request->method) . "Action";
    $response = $controller->$action_name($request);
  } catch(Exception $e) {
    $response = "Unknown Request for " . $request->url_elements[1];
    echo $e->getMessage(),LINE_BREAK;
  }
}
else {
  $response = "Unknown Request";
}

//echo json_encode($response).LINE_BREAK;

