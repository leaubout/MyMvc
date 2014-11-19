<?php

namespace MyMVC;

class Layout{
	
	private $content;

	public function render(){
		$viewFile = APP_PATH . '/layouts/default.phtml';
		require_once $viewFile;
	}

	public function setContent($content){
		$this->content = $content;
	}
}