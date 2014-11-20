<?php

class ErrorController extends \MyMVC\ControllerAbstract{
    
    //protected $handleError;
/*
    public function eee(){
        $this->response->setHttpCode();
    }    

    public function setHandleError($exception){
        $this->view->setPathView('error' . DS . 'error.phtml');
        $this->handleError = $exception;
    }    
    */
    public function errorAction(){
        //$this->response->setHttpCode($this->handleError->getCode());
        //$this->view->message = $this->handleError->getMessage();        
    }
    

    
}