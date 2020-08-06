<?php

namespace application\controllers;

class MainController extends \core\Controller {
	public function indexAction() {
		$content = \core\View::render("main/index.php", [], true);
		\core\View::render("main/template.php", ['BootstrapCDN' => \application\Config::BootstrapCDN, 'title' => 'Index', 'body_content' => $content]);
	}
	
	public function helloAction() {
		echo "hello from the MainController!";
	}
	
	public function testdbAction() {
		$user_model = new \application\models\User();
		$user_model->createTable();
		$id = $user_model->create('Firstname', 'Lastname');
		echo "$id\n";
		print_r($user_model->readLatest(10));
	}
}
