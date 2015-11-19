<?php

include 'config/init.php';

class Misc {
	private $config = null;

	public function __construct() {
		if($this->config == null) {
			$this->config = new Config;
		}
	}

	public function loggedIn() {
		return isset($_SESSION[$this->config->sessionName]) ? true : false;
	}

	public function logout() {
		if(isset($_SESSION[$this->config->sessionName])) {
			session_destroy();
			$this->redirect("index");
		}
	}

	public function redirect($location) {
		header("Location: ".$location);
	}
}