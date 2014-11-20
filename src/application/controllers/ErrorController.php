<?php

class ErrorController extends \MyMVC\ControllerAbstract{

    public function errorAction(){
        //$this->response->setHttpCode($this->handleError->getCode());
        $this->view->exception = $this->request->getException();        
    }
    

    
}