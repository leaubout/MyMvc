<?php

namespace MyMVC;

class ErrorHandler
{
    public static function handleError($errno, $errstr, $errfile, $errline, $context){
        echo $errstr;
        exit($errno);
    }
    
    public static function handleException($exception){
        echo $exception->getMessage();
        exit;
    }
}
