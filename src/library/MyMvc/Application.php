<?php

namespace MyMVC;

class Application{
    
	private $request;
	private $response;
	private $view;

	public function __construct(){
		$this->request = new Request;
		$this->response = new Response;
		$this->view = new View($this->request);
	}

	public function run(){
		// Routing
		$router = new Router;
		$router->route($this->request);

		// Dispatching
		do {
    		try {
        		$controllerClass = ucfirst($this->request->getController()). 'Controller';
        		$controllerFile = APP_PATH . '/controllers/' . $controllerClass . '.php';
        		// test sur l'existence du fichier
        		if (file_exists($controllerFile)){
        		    require_once $controllerFile;
        		}else{
        		    // boucle de dispatching
        		    throw new \Exception('Invalid controller file');
        		}
                // test sur l'existence de la classe
                if (!class_exists($controllerClass)){
                    throw new \Exception('Invalid controller class');
                }
                
        		$actionName = ucfirst($this->request->getAction()). 'Action';
        		// test sur l'action
        		if (!method_exists($controllerClass, $actionName)){
        		    throw new \Exception('Invalid action');
        		}
        		
        		$this->request->setDispatched(true);
        		
        		ob_start();
        		$controller = new $controllerClass($this->request, $this->response, $this->view);
        		$controller->$actionName();
        		
        		// Rendering
        		$this->view->render();
        		$viewContent = ob_get_clean();
    		}catch (\Exception $e){
    		    $this->request->setController('error');
    		    $this->request->setAction('error');
    		    $this->request->setDispatched(false);
    		    $this->request->setException($e);
    		}
		}
		while(!$this->request->isDispatched());
		
		$layout = new Layout($this->request, $this->view);
		$layout->setContent($viewContent);
		ob_start();
		$layout->render();
		$layoutContent = ob_get_clean();

		$this->response->setBody($layoutContent);
		$this->response->send();
		
	}

}