<?php

/**
 * Récupération des variables du controller et chargement de la page .phtml 
 * @author blabla
 *
 */
class View{
    protected $response;
    protected $pathView;
    protected $noRender = FALSE;
    
    public function __construct(Request $request, Response $response){
        $controllerName = $request->getController();
        $actionName = $request->getAction();
        
        $this->setPathView(strtolower($controllerName) . DS . strtolower($actionName) . '.phtml');
        
        $this->setResponse($response);
    }
    
    public function setHeader(){
        http_response_code($this->getResponse()->getResponseCode());
        header('Content-type: '. $this->getResponse()->getContentType());
    }
    
    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

	/**
     * @param field_type $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

	public function render(){
        ob_start();
        include_once APP_PATH . DS . 'views' . DS . $this->pathView;
        $html = ob_get_clean();
        return $html;
    }

    public function setNoRender($flag = TRUE){
        $this->noRender = $flag;
    }
    
    public function isRender(){
        return ! $this->noRender;
    }
    
	/**
     * @return the $pathView
     */
    public function getPathView()
    {
        return $this->pathView;
    }

	/**
     * @param field_type $pathView
     */
    public function setPathView($pathView)
    {
        $this->pathView = $pathView;
    }

    
}