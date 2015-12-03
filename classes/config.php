<?php

class Config {
	private $sessionName = "blog_user";

	public function getSessionName() {
		return $this->sessionName;
	}
}