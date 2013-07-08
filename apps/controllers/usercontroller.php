<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registercontroller
 *
 * @author michael
 */
class UserController extends Controller {
   
    /*
    public function GETAction($request)
    {
        // for testing
        echo "GET registering user".LINE_BREAK;
        var_dump($request->getRequestVars());
        //$this->model = 
    }
     * 
     */

    public function POSTAction(Request $request)
    {
       
        echo "POST registering user".LINE_BREAK;
        var_dump($request->getRequestVars());
        //$this->model = 
    }
    
    /*
    public function PUTAction($request) 
    {
        // for testing
        echo "PUT registering user".LINE_BREAK;
        var_dump($request->getRequestVars());
        //$this->model = 
    }

    public function DELETEAction($request) 
    {
        // for testing
        echo "DELETE registering user".LINE_BREAK;
        var_dump($request->getRequestVars());
        //$this->model = 
    }
     * 
     */

}

?>
