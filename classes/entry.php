<?php

class Entry {
	private $id;
	private $title;
	private $body;
	private $author;
	private $timePosted;

	public function __construct($rows) {
		$this->id = $rows['id'];
		$this->title = $rows['title'];
		$this->body = $rows['body'];
		$this->author = $rows['author'];
		$this->timePosted = $rows['date_posted'];
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

	public function getAuthor() {
		return $this->author;
	}

	public function getTimePosted() {
		return $this->timePosted;
	}
}