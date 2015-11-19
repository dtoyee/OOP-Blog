<nav class="nav-holder">
	<ul class="nav">
		<li><a href="index">Home</a></li>
		<?php
			if($misc->loggedIn()) {
				echo '
					<li><a href="new">New Post</a></li>
					<li><a href="logout">Logout</a></li>
				';
			} else {
				echo '
					<li><a href="register">Register</a></li>
					<li><a href="login">Login</a></li>
				';
			}
		?>
	</ul>
</nav>