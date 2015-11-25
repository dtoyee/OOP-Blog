<?php

class Entry {
	private $id;
	private $title;
	private $body;
	private $timePosted;

	public function __construct($rows) {
		$this->id = $rows['id'];
		$this->title = $rows['title'];
		$this->body = $rows['body'];
		$this->timePosted = $rows['time_posted'];
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getBody() {
		return $this->body;
	}

	public function getTimePosted() {
		return $this->timePosted;
	}
}