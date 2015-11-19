<?php
/*
 * Autoload our classes
 */
spl_autoload_register(function($class) {
	require_once 'classes/'.strtolower($class).'.php';
});

$db = new Database;
$misc = new Misc;
$config = new Config;
$validator = new FormValidator();
$login = new Login($db);
$register = new Register($db);