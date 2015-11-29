<?php

session_start();

include 'config/init.php';

if(isset($_POST['submit'])) {
	$validator->addRule('title', 'Title is a required field', 'required');
	$validator->addRule('body', 'Body is a required field', 'required');

    $validator->addEntries($_POST);
    $validator->validate();
    
    $entries = $validator->getEntries();
    
    foreach ($entries as $key => $value) {
        ${$key} = $value;
    }

    $success = array();
    
    if (!$validator->foundErrors()) {
        $db->query("INSERT INTO entries (title, body, author)
        			VALUES('".$_POST['title']."', '".$_POST['body']."', '".$_SESSION[$config->sessionName]."')");
        $success[] = "Your entry has been added.";
    } else {
    	$errors = $validator->getErrors();
    }
}

if(!$misc->loggedIn()) {
	$misc->redirect("index");
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
				<h2>New Entry</h2>
				<form method="post" action="" class="form">
					<label>Title</label>
					<input type="text" name="title" placeholder="Title">
					<label>Body</label>
					<textarea cols="70" rows="10" placeholder="Body" name="body"></textarea>
					<input type="submit" name="submit" value="Add" class="btn">
				</form>
				<?php
					if(!empty($errors)) {
						foreach($errors as $error => $msg) {
							echo "<div class='error'><span class='msg'>".$msg."</span></div>";
						}
					}

					if(!empty($success) && is_array($success)) {
						foreach($success as $suc) {
							echo "<br><div class='error'><span class='msg'>".$suc."</span></div>";
						}
					}
				?>
			</aside>

			<?php include 'inc/right.php' ?>
		</div>
	</body>
</html>