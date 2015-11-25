<?php

session_start();

include 'config/init.php';

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

			<aside class="left">

			</aside>

			<?php include 'inc/right.php' ?>
		</div>
	</body>
</html>