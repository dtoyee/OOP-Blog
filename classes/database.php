<?php

class Database {
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $table = "blog";

	public $conn = null;

	public function __construct() {
		if($this->conn == null) {
			$this->conn = new mysqli($this->host, $this->username, $this->password, $this->table);
		}
	}

	public function closeConnection() {
		if($this->conn) {
			$this->conn->close();
		}
	}

	public function query($sql) {
		$query = $this->conn->query($sql) or die(mysqli_error($this->conn->conn));
		return $query;
	}
}