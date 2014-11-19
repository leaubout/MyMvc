<?php

namespace MyMVC;

abstract class ControllerAbstract{
	
	protected $view;
	protected $request;
	protected $response;

	public function __construct(Request $request, Response $response, View $view){
		$this->request = $request;
		$this->response = $response;
		$this->view = $view;
	}


}