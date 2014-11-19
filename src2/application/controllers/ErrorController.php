<?php

require_once 'MyMvc/Controller.php';

class ErrorController extends Controller{
    
    protected $handleError;
    
    public function setHandleError($exception){
        $this->view->setPathView('error' . DS . 'error.phtml');
        $this->handleError = $exception;
    }
    
    public function indexAction(){
        
    }
    
    public function errorAction(){
        $this->view->getResponse()->setResponseCode($this->handleError->getCode());
        $this->view->message = $this->handleError->getMessage();
    }
}
