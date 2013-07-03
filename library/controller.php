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
     /*
     public function invoke()  
     {  
          if (!isset($_GET['book']))  
          {  
               // no special book is requested, we'll show a list of all available books  
               $books = $this->model->getBookList();  
               include 'view/booklist.php'; 
          } 
          else 
          { 
               // show the requested book 
               $book = $this->model->getBook($_GET['book']); 
               include 'view/viewbook.php';  
          }  
     }  
      * 
      */
    abstract public function GETAction($request);

    abstract public function POSTAction($request);
    
    abstract public function PUTAction($request);

    abstract public function DELETEAction($request);  

}  

?>
