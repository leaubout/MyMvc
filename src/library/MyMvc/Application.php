<?php

namespace MyMVC;

class Application{
    
	private $request;
	private $response;
	private $view;

	public function __construct(){
		$this->request = new Request;
		$this->response = new Response;
		$this->view = new View ($this->request);
	}

	public function run(){
		// Routing
		$router = new Router;
		$router->route($this->request);

		// Dispatching
		$controllerClass = ucfirst($this->request->getController()). 'Controller';
		$controllerFile = APP_PATH . '/controllers/' . $controllerClass . '.php';
		require_once $controllerFile;

		$actionName = ucfirst($this->request->getAction()). 'Action';
		
		$controller = new $controllerClass($this->request, $this->response, $this->view);
		ob_start();
		$controller->$actionName();
		
		// Rendering
		ob_start();
		$this->view->render();
		$viewContent = ob_get_clean();

		$layout = new Layout;
		$layout->setContent($viewContent);
		ob_start();
		$layout->render();
		$layoutContent = ob_get_clean();

		$this->response->setBody($layoutContent);
		$this->response->send();
		
	}

}