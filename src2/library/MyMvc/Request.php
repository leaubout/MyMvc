<?php

/**
 * Récupération de la requête Navigateur 
 * @author blabla
 *
 */
class Request{

    protected $defaultController = 'index';
    protected $defaultAction = 'index';
    
    protected $serverURI;
    protected $controller;
    protected $action;

    public function __construct(){
        $this->serverURI = $_SERVER['REQUEST_URI'];
        // Request contient les éléments de la requête HTTP
        $requestUri = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
        
        if ($requestUri[0] != ""){
            if (count($requestUri) > 1){
                $this->setAction($requestUri[1]);
            }else{
                $this->setAction($this->defaultAction);   
            }
            $this->setController($requestUri[0]);
        }else{
            $this->setController($this->defaultController);
            $this->setAction($this->defaultAction);
        }
    }    
    
    /**
     * @return the $controller
     */
    public function getController()
    {
        return $this->controller;
    }

	/**
     * @return the $action
     */
    public function getAction()
    {
        return $this->action;
    }

	/**
     * @param field_type $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }
    
    /**
     * @param field_type $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }    
    
}