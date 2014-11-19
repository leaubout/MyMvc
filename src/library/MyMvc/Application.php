<?php

namespace MyMVC;

class Application{
    
	private $request;
	private $response;

	public function __construct(){
		$this->request = new Request;
		//$this->response = new Response;
	}

	public function run(){
		//routing
		$router = new Router;
		$router->route($this->request);

		//dispatching
		
	}

}