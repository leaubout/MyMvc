<?php

class IndexController extends \MyMVC\ControllerAbstract{

	public function indexAction(){
		$this->view->var1 = "page accueil";
	}

	public function testAction(){
		echo 'test';
	}
}