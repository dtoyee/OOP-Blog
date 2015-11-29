<?php

session_start();

include 'config/init.php';
include('classes/paginator.php');

$pages = new Paginator('5','p');

$rows = $db->query('SELECT COUNT(id) FROM entries');
$total = $rows->fetch_row();

$pages->set_total($total[0]);

$entry = $db->getAllEntries("SELECT * FROM entries ORDER BY id DESC ".$pages->get_limit());

?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>OOP Blog</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/paginator.css" rel="stylesheet">
	</head>
	<body>

		<div class="wrapper">
			<?php include 'inc/nav.php' ?>

			<aside class="left">
				<?php
					if($entry) {
						foreach($entry as $entries) {
							echo "
								<article>
									<header>
										<a href='entry?id=".$entries->getId()."'>".$entries->getTitle()."</a>
									</header>
									<section class='time'>Posted by ".$entries->getAuthor()." on ".$misc->convertDate('jS, F Y', $entries->getTimePosted())."</section>
									<section class='body'>".nl2br($entries->getBody())."<br><br></section>
								</article>
								<hr>
							";
						}
					} else {
						echo "<h3>No entries found.</h3>";
					}

					echo $pages->page_links();
				?>
			</aside>

			<?php include 'inc/right.php' ?>
		</div>
	</body>
</html>