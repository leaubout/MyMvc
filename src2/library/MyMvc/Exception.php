<?php

class MyMvc_Exception extends Exception{
    
    protected $message;
    protected $code;
    
    public function __construct($message, $code){
        $this->message = $message;
        $this->code = $code;
    }
}