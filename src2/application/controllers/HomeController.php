<?php

require_once 'MyMvc/Controller.php';

class HomeController extends Controller{

    public function indexAction(){

        $this->view->titre = "Je suis l'accueil";
    }
    
}