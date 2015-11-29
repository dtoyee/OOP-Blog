<?php

include '../classes/database.php';

$db = new Database();

if(!$db->tableExists("users")) {
	$users_table = $db->query("CREATE TABLE IF NOT EXISTS users(
						   id INT(11) NOT NULL AUTO_INCREMENT,
						   username VARCHAR(30) NOT NULL,
						   email VARCHAR(255) NOT NULL,
						   password VARCHAR(60) NOT NULL,
						   user_group ENUM('0', '1') NOT NULL default '1',
						   primary key(id)
						)");
	echo "Users table has been created.<br>";
} else {
	echo "Users table already exists.<br>";
}

if(!$db->tableExists("entries")) {
	$entries_table = $db->query("CREATE TABLE IF NOT EXISTS entries(
						   id INT(11) NOT NULL AUTO_INCREMENT,
						   title VARCHAR(255) NOT NULL,
						   body text NOT NULL,
						   author VARCHAR(100) NOT NULL,
						   date_posted timestamp default current_timestamp,
						   primary key(id)
						)");
	echo "Entries table has been created.<br>";
} else {
	echo "Entries table already exists.<br>";
}