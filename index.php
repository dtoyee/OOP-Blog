<?php

include 'classes/database.php';
include 'classes/formvalidator.php';
include 'classes/validationrule.php';

$db = new Database;
$validator = new FormValidator();

// if(isset($_POST['submit'])) {
// 	$validator->addRule('username', 'Username is a required field', 'required');
//     $validator->addRule('username', 'Username must be longer than 2 characters', 'minlength', 2);
//     $validator->addRule('name', 'Name is a required field', 'required');
//     $validator->addRule('name', 'Name must be longer than 2 characters', 'minlength', 2);

//     $validator->addEntries($_POST);
//     $validator->validate();
    
//     $entries = $validator->getEntries();
    
//     foreach ($entries as $key => $value) {
//         ${$key} = $value;
//     }
    
//     if ($validator->foundErrors()) {
//         $errors = $validator->getErrors();
//     }	
// }

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
			<nav class="nav-holder">
				<ul class="nav">
					<li><a href="index">Home</a></li>
					<li><a href="register">Register</a></li>
					<li><a href="login">Login</a></li>
				</ul>
			</nav>

			<section class="content">
				
			</section>
		</div>
	
	</body>
</html>