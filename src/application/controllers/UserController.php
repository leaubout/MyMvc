<?php

require_once 'MyMvc/Controller.php';

class UserController extends Controller{
    
    public function indexAction(){
        $this->view->titre = "Je suis index";
    }
    
    public function createAction(){
        $this->view->titre = "Je suis create";
        // instanciation d'un service
        //$service = new Service_User();
        
        // appel d'une fonction du service
        //$codeRetour = $service->create();
        
        // si le code de retour est correct
            // message de succès
        // sinon
            // affichage du message d'erreur
        
    }
    
    public function readAction(){
        $this->view->titre = "Je suis read";
    }
    
    public function updateAction(){
        $this->view->titre = "Je suis update";
        $this->view->getResponse()->setResponseCode(200);
    }
    
    public function deleteAction(){
        $this->view->setNoRender();
        $this->view->getResponse()->setContentType('application/json');
        // suppression en BD
        // affichage de la réussite via le systemAlert avec les sessions
    }
    
}