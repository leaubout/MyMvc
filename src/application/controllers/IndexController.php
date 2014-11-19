<?php

require_once APP_PATH . '/models/Test.php';
require_once APP_PATH . '/models/mappers/User.php';

class IndexController extends \MyMVC\ControllerAbstract{

	public function indexAction(){
	    $userMapper = new Mapper_User;
	    $user = $userMapper->find(3);
	    var_dump($user);
		$model = new Test;
		$this->view->var1 = $model->getRandomValue();
	}

	public function testAction(){
		echo 'test';
	}
}