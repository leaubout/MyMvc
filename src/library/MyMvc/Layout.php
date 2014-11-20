<?php

namespace MyMVC;

class Layout{
	
    /**
     * 
     * @var Request
     */
	private $request;
    private $content;
    private $view;
	
    public function __construct($request, $view){
        $this->request = $request;
        $this->view = $view;
    }

	public function render(){
		$viewFile = APP_PATH . '/layouts/default.phtml';
		require_once $viewFile;
	}

	public function setContent($content){
		$this->content = $content;
	}
	
	public function isActive($route){
	    $internal = $this->request->getController() . '/' . $this->request->getAction();
	    return ($route == $internal);
	}
/*	
	public function getTitle(){
	    return $this->view->getTitle();
	}
*/

	public function __call($method, $args){
	    if (method_exists($this->view, $method)){
	        return $this->view->$method(implode(',',$args));
	    }else{
	        throw new \Exception('Unknown method ' . $method);
	    }
	}
	
}