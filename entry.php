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
				<?php 
					if(isset($_GET['id'])) {
						$id = $db->conn->real_escape_string(trim($_GET['id']));
						$entry = $db->getEntryById($id);

						foreach($entry as $ent) {
							echo "
								<article>
									<header>
										<a href='entry?id=".$ent->getId()."'>".$ent->getTitle()."</a>
									</header>
									<section class='time'>Posted by ".$ent->getAuthor()." on ".$misc->convertDate('jS, F Y', $ent->getTimePosted())."</section>
									<section class='body'>".nl2br($ent->getBody())."<br><br></section>
								</article>
							";
						}
					}
				?>
			</aside>

			<?php include 'inc/right.php' ?>
		</div>
	</body>
</html>