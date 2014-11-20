<?php

require_once APP_PATH . '/services/User.php';

class IndexController extends \MyMVC\ControllerAbstract{
   
	public function indexAction(){
	    $userApi = new Service_User;
	    $user = $userApi->find(1);
		$this->view->user = $user;
		$this->view->title("Page de : " . $user->getName());
	}

	public function testAction(){
		//echo 'test';
	    $this->view->title("Page de test");
	}
		
}