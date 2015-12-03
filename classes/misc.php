<?php

class Misc {
	private $config = null;

	public function __construct() {
		if($this->config == null) {
			$this->config = new Config;
		}
	}

	public function loggedIn() {
		return isset($_SESSION[$this->config->getSessionName()]) ? true : false;
	}

	public function logout($location) {
		if(isset($_SESSION[$this->config->getSessionName()])) {
			session_destroy();
			$this->redirect($location);
		}
	}

	public function getSession() {
		return $_SESSION[$this->config->getSessionName()];
	}

	public function redirect($location) {
		header("Location: ".$location);
	}

	public function convertDate($dateFormat, $date) {
		return date($dateFormat, strtotime($date));
	}

	// May need to do a bit more to get the visitors IP
	public function getIp() {
		return $_SERVER['REMOTE_ADDR'];
	}
}