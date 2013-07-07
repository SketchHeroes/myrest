<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author michael
 */
class ControllerRouter {
    
    public function route(Request $request)
    {
        // default controller name (in case no resourse has been specified
        $controller_name = DEFAULT_CONTROLLER;
        
        $resource = $request->getResource();
        
        // constract controller name from resource requested
        if( count($resource) ) 
        {
          $controller_name = ucfirst($resource[1]) . 'Controller';
        }
        
        try 
        {
          // contruct the controller and route the request to the appropriate 
          // method
          $controller = new $controller_name();
          $action_name = ucfirst($request->getMethod()) . "Action";
          $response = $controller->$action_name($request);
        } 
        catch(Exception $e) {
          $response = "Unknown Request for " . $resource[1];
          echo $e->getMessage(),LINE_BREAK;
        }

    }
}

?>
