<?php

session_start();

include 'config/init.php';

if(isset($_POST['submit'])) {
	$validator->addRule('username', 'Username is a required field', 'required');
    $validator->addRule('username', 'Username must be longer than 2 characters', 'minlength', 2);
    $validator->addRule('password1', 'Password is a required field', 'required');

    $validator->addEntries($_POST);
    $validator->validate();
    
    $entries = $validator->getEntries();
    
    foreach ($entries as $key => $value) {
        ${$key} = $value;
    }
    
    if (!$validator->foundErrors()) {
        $login->login(array(
        	$_POST['username'],
        	$_POST['password1']
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

			<aside class="left">
				<h2>Account Login</h2>
				<form action="" method="post" class="form">
					<label>Username</label>
					<input type="text" name="username" placeholder="Username">
					<label>Password</label>
					<input type="password" name="password1" placeholder="Password">
					<input type="submit" name="submit" value="Login" class="btn">
				</form>

				<?php
					if(!empty($errors)) {
						foreach($errors as $error => $msg) {
							echo "<div class='error'><span class='msg'>".$msg."</span></div>";
						}
					}

					if(!empty($login->showMessage())) {
						echo "<br><div class='error'><span class='msg'>".$login->showMessage()."</span></div>";
					}
				?>
			</aside>

			<?php include 'inc/right.php' ?>
		</div>
	
	</body>
</html>