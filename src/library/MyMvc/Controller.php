<?php

require_once 'MyMvc/Exception.php';

abstract class Controller{
    
    /**
     * La vue 
     * @var View
     */
    protected $view;
    /**
     * La request
     * @var Request
     */
    protected $request;
    
    public function __construct(View $view, Request $request){
        $this->setView($view);
        $this->init();
    }

    
    // actions par défaut, par exemple, vérifier que l'utilisateur est connecté
    public function init(){}
    
    abstract public function indexAction();
    
	/**
     * @return the $view
     */
    public function getView()
    {
        return $this->view;
    }

	/**
     * @param field_type $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    
}
