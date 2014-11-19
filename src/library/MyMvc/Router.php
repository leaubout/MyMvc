<?php

namespace MyMVC;

class Router{
    
    public function route(\MyMVC\Request $request){
        // Request contient les éléments de la requête HTTP
        $requestUri = explode('/', trim($request->getUri(),'/'));
        
        if ($requestUri[0] != ""){
            if (count($requestUri) > 1){
                $request->setAction($requestUri[1]);
            }else{
                $request->setAction(Request::REQUEST_DEFAULT_ACTION);
            }
            $request->setController($requestUri[0]);
        }else{
            $request->setController(Request::REQUEST_DEFAULT_CONTROLLER);
            $request->setAction(Request::REQUEST_DEFAULT_ACTION);
        }        
    }
}