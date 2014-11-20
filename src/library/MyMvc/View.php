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
	
	public function __call($method, $args){
	    
	    $helperFile = APP_PATH . '/viewhelpers/' . ucfirst($method) . '.php';
	    if (!file_exists($helperFile)){
	        throw new \Exception('unknown view helper file for ' . $method);
	    }
	    // inclusion dynamique du fichier
	    require_once $helperFile;
	    
	    $helperClass = 'Viewhelper_' . ucfirst($method);
	    if (!class_exists($helperClass)){
	        throw new \Exception('unknown view helper class for ' . $method);
	    }
	    // instanciation dynamique de la classe
	    $helper = new $helperClass;
	    
	    if (!method_exists($helper, $method)){
	        throw new \Exception('unknown view helper method for ' . $method);
	    }
	    // appel dynamique de la méthode
        return $helper->$method(implode(',', $args));
	    
	    
	}

	
}