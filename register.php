<?php

session_start();

include 'config/init.php';

if(isset($_POST['submit'])) {
	$validator->addRule('username', 'Username is a required field', 'required');
    $validator->addRule('username', 'Username must be longer than 2 characters', 'minlength', 2);
    $validator->addRule('email', 'Email is a required field', 'required');
    $validator->addRule('password1', 'Password is a required field', 'required');
    $validator->addRule('password2', 'Repeat password is a required field', 'required');

    $validator->addEntries($_POST);
    $validator->validate();
    
    $entries = $validator->getEntries();
    
    foreach ($entries as $key => $value) {
        ${$key} = $value;
    }
    
    if (!$validator->foundErrors()) {
        $register->register(array(
        	$_POST['username'],
        	$_POST['email'],
        	$_POST['password1'],
        	$_POST['password2']
        ));
    } else {
    	$errors = $validator->getErrors();
    }
}

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
				<h2>Account Registration</h2>
				<form action="" method="post" class="form">
					<label>Username</label>
					<input type="text" name="username" placeholder="Username">
					<label>Email</label>
					<input type="email" name="email" placeholder="Email">
					<label>Password</label>
					<input type="password" name="password1" placeholder="Password">
					<label>Repeat Password</label>
					<input type="password" name="password2" placeholder="Repeat Password">
					<input type="submit" name="submit" value="Register" class="btn">
				</form>

				<?php
					if(!empty($errors)) {
						foreach($errors as $error => $msg) {
							echo $msg.'<br>';
						}
					}

					if(!empty($register->showMessage())) {
						echo $register->showMessage();
					}
				?>
			</section>
		</div>
	
	</body>
</html>