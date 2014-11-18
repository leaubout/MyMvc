<?php

require_once 'MyMvc/Request.php';
require_once 'MyMvc/View.php';
require_once 'MyMvc/Response.php';
require_once 'MyMvc/Exception.php';

/**
 * FrontController fait la relation entre la vue, le controller, charge la response.
 * (précédemment : Récupération de l'objet Request,
 * Identification du controller
 * Appel du controller identifié
 * Récupération des valeurs renvoyées par le controller
 * Envoi des valeurs à l'objet view)
 * @author blabla
 *
 */
class FrontController {
    
    protected $request;
    protected $controller;
    protected $view;
    
    /**
     * Initialise les variables Request et View
     * Initialise le Controller
     * @param Request $request
     */
    public function __construct(Request $request, View $view){
        $this->setRequest($request);
        $this->setView($view);
        
        try {
            $this->initController();
        }catch(MyMvc_Exception $exception){
            require_once APP_PATH. DS . 'controllers' . DS . 'ErrorController.php';
            $errorController = new ErrorController($view, $request);
            $errorController->setHandleError($exception);
            $this->setController($errorController);
            $request->setAction('error');
        }        
        //new Response($this->getView());
    }
    
    /**
     * Initialise le Controller, instanciation dynamique de l'objet
     * le controller récupère et modifie (LB : éventuellement ?) la vue
     */
    public function initController(){
        $controllerName = ucfirst($this->request->getController()) . 'Controller';
        
        $pathController = APP_PATH . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($pathController)){
            require_once $pathController;
            if (class_exists($controllerName)){
                $controller = new $controllerName($this->getView(), $this->getRequest());
                $this->setController($controller);
            }else{
                throw new MyMvc_Exception('ControllerClass not found', 500);
            }
        }else{
            throw new MyMvc_Exception('ControllerFile not found', 404);
        }
    }
    
	/**
     * @return the $request
     */
    public function getRequest()
    {
        return $this->request;
    }

	/**
     * @return the $view
     */
    public function getView()
    {
        return $this->view;
    }

	/**
     * @return the $controller
     */
    public function getController()
    {
        return $this->controller;
    }

	/**
     * @param field_type $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

	/**
     * @param field_type $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @param field_type $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }    
}