<?php

namespace MyMVC;

class View{
	
	private $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function render(){
		$viewFile = APP_PATH . '/views/' .
						strtolower($this->request->getController()) . '/' .
						strtolower($this->request->getAction()) . '.phtml';
		require_once $viewFile;
	}
}