<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of request
 *
 * @author michael
 */
class Request {
	private $parameters;
	private $data;
	private $http_accept;
        private $format;
	private $method;
	private $resource;
        private $query_str_params;

	public function __construct()
	{
		$this->parameters	= array();
                $this->query_str_params = array();
		$this->data             = '';
		$this->http_accept      = 'json';
		$this->method		= 'GET';
                $this->resource         = array();
                $this->format           = 'json';
	}
        
        public function init()
        {
                // figure out the method 
                $this->method =  $_SERVER['REQUEST_METHOD'];
            
                // get http_accept
		if(isset($_SERVER['HTTP_ACCEPT']))
                {
                    $this->http_accept = (strpos($_SERVER['HTTP_ACCEPT'], 'json')) ? 'json' : 'xml';
                }                    
                
                // get resource
		if(isset($_SERVER['REDIRECT_URL'])) 
                {
                    $this->resource = array_values(array_filter(explode('/', $_SERVER['REDIRECT_URL']), 'strlen'));
                }
                
                // get the query_string params (used in GET method)
                if (isset($_SERVER['QUERY_STRING'])) 
                {
                    parse_str($_SERVER['QUERY_STRING'], $this->query_str_params);
                    echo 'query string params:';
                    var_dump($this->query_str_params);
                    echo LINE_BREAK;
                }
                
                // get parameters passed through the body of the http request
                // with ( POST, PUT ) 
                // DELETE ?
                $this->data = file_get_contents("php://input");
                echo "php://input: ".$this->data.LINE_BREAK;
                   
                // check if content type set 
                if(isset($_SERVER['CONTENT_TYPE'])) 
                {
                    $content_type = $_SERVER['CONTENT_TYPE'];
                    
                    echo 'content type: '.$content_type.LINE_BREAK;
           
                    switch($content_type) 
                    {
                        // in case the request body is in json format
                        case "application/json":
                            $parameters = array();
                            $this->parameters = json_decode($this->data,true);
                            $this->format = "json";
                            break;
                        case "application/x-www-form-urlencoded":
                            parse_str($this->data, $this->parameters);
                            $this->format = "html";
                            break;
                        case "multipart/form-data":
                            // to be continued...
                            break;
                        default:
                            break;
                    }
                }
                else 
                {
                    // getting the parameters the default way
                    $this->parameters = parse_str($this->data, $this->parameters);
                    $this->format = "html";
                }
                
                echo 'parameters:';
                var_dump($this->parameters);
                echo LINE_BREAK;
        }



        public function setData($data)
	{
		$this->data = $data;
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	public function setParameters($request_vars)
	{
		$this->request_vars = $request_vars;
	}
	
	public function getData()
	{
		return $this->data;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getHttpAccept()
	{
		return $this->http_accept;
	}

	public function getParameters()
	{
		return $this->parameters;
	}
	
	public function getResource()
	{
		return $this->resource;
	}
}

?>
