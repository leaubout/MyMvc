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

    // virtualisation des méthodes pour proxy vers la vue
	public function __call($method, $args){
        return $this->view->$method(implode(',',$args));
	}
	
}