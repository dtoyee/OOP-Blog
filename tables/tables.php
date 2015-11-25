<?php

include '../config/init.php';

$users_table = $db->query("CREATE TABLE IF NOT EXISTS users(
						   id INT(11) NOT NULL AUTO_INCREMENT,
						   username VARCHAR(30) NOT NULL,
						   email VARCHAR(255) NOT NULL,
						   password VARCHAR(60) NOT NULL,
						   user_group ENUM('0', '1') NOT NULL default '1',
						   primary key(id)
						)");