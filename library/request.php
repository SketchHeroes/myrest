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
	private $request_vars;
	private $data;
	private $http_accept;
	private $method;
	private $resource;

	public function __construct()
	{
		$this->request_vars		= array();
		$this->data				= '';
		$this->http_accept		= (strpos($_SERVER['HTTP_ACCEPT'], 'json')) ? 'json' : 'xml';
		$this->method			= 'GET';
		if(isset($_SERVER['REDIRECT_URL'])) 
                {
                    $this->resource         = array_values(array_filter(explode('/', $_SERVER['REDIRECT_URL']), 'strlen'));
                }
	}
	
	public function setData($data)
	{
		$this->data = $data;
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	public function setRequestVars($request_vars)
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

	public function getRequestVars()
	{
		return $this->request_vars;
	}
	
	public function getResource()
	{
		return $this->resource;
	}
}

?>
