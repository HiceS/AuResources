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
		<div>
			<a>Hello:
			<br>
			<?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			</a>
			<ul>
				<?php
				
				$query = "
				SELECT COUNT(*) AS
				 NumberOfMessages
				FROM messaging
				";
				try{
					// These two statements run the query against your database table.
					$stmt = $db->prepare($query);
					$result = $stmt->execute($query_params);
				}
				catch(PDOException $ex)
				{
					// Note: On a production website, you should not output $ex->getMessage().
					// It may provide an attacker with helpful information about your code. 
					die("Failed to run query: " . $ex->getMessage());
				}
				
				$num_rows = $result; 
				$x = 1;
				do{
				?>
					<li>
						<?php
						
						$query = "
						SELECT 
							title
						FROM messaging
						WHERE
							$num_rows = id 
						";
						try
						{
							// Execute the query against the database
							$stmt = $db->prepare($query);
							$result = $stmt->execute($query_params);
						}
						catch(PDOException $ex)
						{
							// Note: On a production website, you should not output $ex->getMessage().
							// It may provide an attacker with helpful information about your code. 
							die("Failed to run query: " . $ex->getMessage());
						}
						$row = $stmt->fetch();
						if($row){
							print($result);
						}
			            ?>
					</li>
				<?php
				} while ($num_rows >= $x);
				?>
			</ul>
			<input type="submit" href="index.php?page=messaging"/>
		</div>
	</body>
</html>