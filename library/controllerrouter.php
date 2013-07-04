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
        $controller_name = DEFAULT_CONTROLLER;
        
        // route the request
        if($request->url_elements) 
        {
          $controller_name = ucfirst($request->url_elements[1]) . 'Controller';
        }
        
        try 
        {         
          $controller = new $controller_name();
          $action_name = ucfirst($request->method) . "Action";
          $response = $controller->$action_name($request);
        } 
        catch(Exception $e) {
          $response = "Unknown Request for " . $request->url_elements[1];
          echo $e->getMessage(),LINE_BREAK;
        }

    }
}

?>
