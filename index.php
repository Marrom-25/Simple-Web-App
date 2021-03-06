<?php
session_start();
class Index{
	function __construct(){

		$request = (!isset($_GET['page']) || $_GET['page'] == "") ? "home" : $_GET['page'];
		if(!isset($_GET['page']) && !isset($_SESSION['AMGI']['username'])){
			$request = "login";
		}

		$uri = [
			'login' => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'Login'
			],
			'register' => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'Register'
			],

			"home" => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'Index'
			],

			"edit" => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'Edit'
			],
			"add" => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'Add'
			],
			"resetPassword" => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'resetPass'
			],

			"logout" => [
				'dir' => './controllers/users.php',
				'controller' => 'Users',
				'fn' => 'Logout'
			],


		];


		require $uri[$request]['dir'];
		$ctrl = new $uri[$request]['controller'];
		$ctrl->{$uri[$request]['fn']}();


	}	
}

new Index;


?>