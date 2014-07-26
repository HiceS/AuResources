<?php
				// First we execute our common code to connection to the database and start the session
				require("common.php");
				
				// At the top of the page we check to see whether the user is logged in or not
				if(empty($_SESSION['user']))
				{
					// If they are not, we redirect them to the login page.
					header("Location: index.php?page=login");
					
					// Remember that this die statement is absolutely critical.  Without it,
					// people can view your members-only content without logging in.
					die("Redirecting to login.php");
				}
				
				// Everything below this point in the file is secured by the login system
				
				// We can display the user's username to them by reading it from the session array.  Remember that because
				// a username is user submitted content we must use htmlentities on it before displaying it to the user.
			?>
<html>
	<body>
		<div id="login-wrapper" class="wrapper">
			<form id="log-form" action="index.php?page=mes_insert" method="post">
			<a>Hello:
			<br>
			<?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			</a>
				<ul>
					<li>
						<label for="title">Title:</label>
						<input type="varchar" name="title"/>
					</li>
					<li>
						<label for="message">Message:</label>
						<input type="text" name="message"/>
					</li>
					<li>
						<a name="name" for="name"><?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?></a>
					</li>
					<li class="buttons">
						<input type="submit" href="index.php?page=mes_insert" name="message" value="Finished" />
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>