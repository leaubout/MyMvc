<?php

/**
 * Gestionnaire qui fera la relation enre l'objet Request,
 * l'objet FrontController et l'objet Response
 * @author blabla
 *
 *
 */

require_once 'MyMvc/Request.php';
require_once 'MyMvc/FrontController.php';

class Application{
    
    private $request;
    private $response;
    private $view;
    private $session;
    private $cookies;
    
    public function __construct(){
        $this->request = new Request();
        $this->response = new Response();
        $this->view = new View($this->request, $this->response);
        //$this->session = new Session();
        //$this->cookies = new Cookies();
        
    }

    public function run(){
        $fc = new FrontController($this->request, $this->view);
        
        $this->view->setHeader();
        
        if ($this->view->isRender()){
            echo $this->view->render();
        }
    }
}