<?php

require_once APP_PATH . '/services/User.php';

class IndexController extends \MyMVC\ControllerAbstract{

	public function indexAction(){
	    $userApi = new Service_User;
		$this->view->user = $userApi->find(1);
	}

	public function testAction(){
		//echo 'test';
	}
}