<?php

class Register {
	/*
	 * An array to hold all errors
	 */
	private $messages = array();
	/*
	 * Hold the database connection
	 */
	private $conn = null;
	/*
	 * All the possible registration errors
	 */
	private $errorMessages = array(
		"Both passwords much match.",
		"That username is already in use.",
		"That email is already in use."
	);

	public function __construct($db) {
		if($this->conn == null) {
			$this->conn = $db;
		}
	}
	/*
	 * We are assuming that the data passed through in the array is the typical 
	 * registration data
	 * - username [0]
	 * - email [1]
	 * - password [2]
	 * - repeated password [3]
	 */
	public function register($data = array()) {
		if($this->valueExists("users", "username", $data[0])) {
			if($this->valueExists("users", "email", $data[1])) {
				if($this->passwordsMatch(array($data[2], $data[3]))) {
					$password = $this->hashPassword($data[2]);
					$this->conn->query("
						INSERT INTO users
						(username, email, password)
						VALUES('$data[0]', '$data[1]', '$password')
					");
					$this->addMessage("Your account has been registered!");
				} else {
					$this->addMessage($this->errorMessages[0]);
				}
			} else {
				$this->addMessage($this->errorMessages[2]);
			}
		} else {
			$this->addMessage($this->errorMessages[1]);
		}
	}

	private function passwordsMatch($passwords = array()) {
		return $passwords[0] == $passwords[1] ? true : false;
	}

	private function valueExists($table, $row, $value) {
		$query = $this->conn->query("SELECT $row FROM $table WHERE $row = '$value'");
		return $query->num_rows == 0 ? true : false;
	}

	private function hashPassword($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	private function addMessage($message) {
		$this->messages[] = $message;
	}

	public function showMessage() {
		foreach($this->messages as $msg) {
			return $msg;
		}
	}
}