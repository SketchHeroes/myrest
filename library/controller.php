<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author michael
 */
abstract class Controller { 
    
    protected $model;
    protected $view;
  
     public function __construct()    
     { 
         //$class_name = get_called_class();  
         //$action = substr($class_name, 0, -10);
         //$model_classname = $action."Model";   
         //$view_classname = $action."View";      
         //echo $view_classname.LINE_BREAK;
         
          //$this->model = new $model_classname();  
          //$this->view = new $view_classname(); 
     }  
     
     // dealing with unsupported methods
     public function __call($name, $params) {
        // in case the function is HTTP method with a Request as the first
        // parameter
        if(isset($params[0]) && get_class($params[0]) === 'Request' )
        {
            $response = 'unsupported HTTP method '.$params[0]->getMethod() 
                 .' for resource '.implode("/",$params[0]->getResource()).LINE_BREAK;
        }
        else 
        {
            $response = 'unsupported HTTP method '.LINE_BREAK;   
        }   
        return $response;
     }

     
    //abstract public function GETAction($request);

    //abstract public function POSTAction($request);
    
    //abstract public function PUTAction($request);

    //abstract public function DELETEAction($request);  

}  

?>
