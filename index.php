<?php

session_start();

include 'config/init.php';

$db = new Database;
$misc = new Misc;
$config = new Config;

?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>OOP Blog</title>
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>

		<div class="wrapper">
			<?php include 'inc/nav.php' ?>

			<section class="content">
				
			</section>
		</div>
	</body>
</html>