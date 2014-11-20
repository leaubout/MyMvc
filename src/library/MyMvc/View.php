<?php

namespace MyMVC;

class View{
	
	private $request;
	private $title;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function render(){
		$viewFile = APP_PATH . '/views/' .
						strtolower($this->request->getController()) . '/' .
						strtolower($this->request->getAction()) . '.phtml';
		require_once $viewFile;
	}
	
	public function setTitle($title){
	    $this->title = $title;
	}	
	
	public function getTitle(){
	    return $this->title;
	}
	
}