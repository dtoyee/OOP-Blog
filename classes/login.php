<?php

class Login {
	/*
	 * An array to hold all errors
	 */
	private $messages = array();
	/*
	 * Hold the database connection
	 */
	private $conn = null;
	/*
	 * Hold the config
	 */
	private $config = null;
	/*
	 * All the possible login errors
	 */
	private $errorMessages = array(
		"Incorrect username",
		"Incorrect password"
	);

	public function __construct($db) {
		if($this->conn == null) {
			$this->conn = $db;
		}
		if($this->config == null) {
			$this->config = new Config();
		}
	}
	/*
	 * We assume that we are passing through just the username and password details
	 * - username [0]
	 * - password [1]
	 */
	public function login($data = array()) {
		if($this->usernameExists("users", $data[0])) {
			if($this->verifyPassword($data[1], $this->getPassword("users", $data[0]))) {
				$_SESSION[$this->config->getSessionName()] = $data[0];
				header("Location: index");
			} else {
				$this->addMessage($this->errorMessages[1]);
			}
		} else {
			$this->addMessage($this->errorMessages[0]);
		}
	}

	private function getPassword($table, $username) {
		$password = $this->conn->query("SELECT password FROM $table WHERE username = '$username'");
		$results = $password->fetch_assoc();
		return $results['password'];
	}

	private function usernameExists($table, $username) {
		$user = $this->conn->query("SELECT username FROM $table WHERE username = '$username'");
		return $user->num_rows > 0 ? true : false;
	}

	private function verifyPassword($password, $hash) {
		return password_verify($password, $hash) ? true : false;
	}

	private function addMessage($message) {
		$this->messages[] = $message;
	}

	public function showMessage() {
		foreach($this->messages as $message) {
			return $message;
		}
	}
}