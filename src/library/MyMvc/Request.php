<?php

namespace MyMVC;

/**
 * Récupération de la requête Navigateur 
 * @author blabla
 *
 */
class Request{

    const REQUEST_DEFAULT_CONTROLLER = 'index';
    const REQUEST_DEFAULT_ACTION = 'index';
    
    private $uri;
    private $controller;
    private $action;
    
    public function __construct(){
        $this->uri = $_SERVER['REQUEST_URI'];
    }
	/**
     * @return the $uri
     */
    public function getUri()
    {
        return $this->uri;
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
     * @param field_type $uri
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
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