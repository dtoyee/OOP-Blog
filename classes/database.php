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
		$query = $this->conn->query($sql) or die(mysqli_error($this->conn));
		return $query;
	}

	public function tableExists($table) {
		$table = $this->query("SHOW TABLES LIKE '$table'") or die(mysqli_error($this->conn));
		return $table->num_rows;
	}

	public function getAllEntries($sql) {
		$entries = $this->query($sql);
		while($rows = $entries->fetch_assoc()) {
			$data[] = new Entry($rows);
		}
		return !(empty($data)) ? $data : false;
	}

	public function protectString($str) {
		return $this->conn->real_escape_string(trim($str));
	}

	public function getEntryById($id) {
		$entry = $this->query("SELECT * FROM entries WHERE id = '$id'");
		while($rows = $entry->fetch_assoc()) {
			$data[] = new Entry($rows);
		}
		return !(empty($data)) ? $data : false;
	}
}