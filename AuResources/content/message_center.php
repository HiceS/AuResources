<?php
	
				ini_set('error_reporting', E_ALL);
				ini_set('display_errors', 1);
				
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
		<div>
			<a>Hello:
			<br>
			<?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			</a>
			<ul>
				<?php
				
	//			$result = mysql_query("SELECT * FROM messaging");
				
				$query = "
					SELECT
						*
					FROM messaging
				";
				try{
					// These two statements run the query against your database table.
					$stmt = $db->prepare($query);
					$result = $db->execute($query);
				}
				catch(PDOException $ex)
				{
					// Note: On a production website, you should not output $ex->getMessage().
					// It may provide an attacker with helpful information about your code. 
					die("Failed to run query: " . $ex->getMessage());
				}
				$num_rows = mysql_num_rows($result);
				
				echo($num_rows);
				if (!$result) {
					die('Invalid query: ' . mysql_error());
				}
				
			//	$x = 1;
			//	for($x = 1; $x <= $num_rows; $x++)
			//	{
				?>
					<li>
						
					</li>
				<?php
			//	}
				?>
				<li class="buttons">
					<input name="New message" type="submit" onclick="location.href='index.php?page=messaging'"/>
			</ul>
		</div>
	</body>
</html>