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
        
        // check if the resource is not empty and alphanumeric
        // ( preventing \ resorce trying to instantiate abstract class Controller )
        if( count($resource)>1 && ctype_alnum($resource[1]) ) 
        {
            // constract controller name from resource requested
            $controller_name = ucfirst($resource[1]) . 'Controller';
        
            try 
            {
              // contruct the controller and route the request to the appropriate 
              // method of the controller
              $controller = new $controller_name();
              $action_name = ucfirst($request->getMethod()) . "Action";
              $response = $controller->$action_name($request);
            } 
            catch(Exception $e) 
            {
              $response = "unsupported resource " . $resource[1];
              echo $e->getMessage(),LINE_BREAK;
            }
            
        }
        else
        {
            $response = "no resource requested";
        }
        
        echo $response.LINE_BREAK;

    }
}

?>
