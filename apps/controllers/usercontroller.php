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
   

    public function POSTAction(Request $request)
    {
        echo LINE_BREAK;
        echo "POST " .implode("/",$request->getResource()).LINE_BREAK;
        echo "registering user '" .$request->getParameters()['user']
                ."' with password '".$request->getParameters()['pass']."'". LINE_BREAK;
        //var_dump($request->getRequestVars());
        //$this->model = 
        
        if( isset($request->getResource()[2]) )
        {
            //echo $request->getResource()[2].LINE_BREAK;
            //return $events[$request->url_elements[2]];
        }

    }

}

?>
