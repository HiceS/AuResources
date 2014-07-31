<?php
	
			//	ini_set('error_reporting', E_ALL);
			//	ini_set('display_errors', 1);
				
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
	<div id="body-wrapper" class="wrapper">
	<form id="info_all-wrapper">
		<div class="padded_info">
		<h1><span class = "hugetitle" style="text-align: center;"><font color="#FFD119">Au</font>Messaging: </span></h1>
				<div id="info_written">
			<a>Hello:
				<br>
					<?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?>
				<br>
			</a>
					<ul>
						<?php
						
						$query = "
							SELECT
								*
							FROM messaging
						";
						try{
							// These two statements run the query against your database table.
							$stmt = $db->prepare($query);
							$result = $stmt->execute();
						}
						catch(PDOException $ex)
						{
							// Note: On a production website, you should not output $ex->getMessage().
							// It may provide an attacker with helpful information about your code. 
							die("Failed to run query: " . $ex->getMessage());
						}
						
						if (!$result) {
							die('Invalid query: ' . mysql_error());
						}
						
						$data = $stmt->fetchAll();
					
						//for($x = 0; $x <= $row_data.length; $x++) {
						foreach ($data as $row_data) {
						//do{
						?>
							<li>
							Title:
							<br>
							<?php
							//	$x++;
							print($row_data["title"]);
							//	var_dump($num_rows);
							//	print($x);
								?>
								<ul>
									<li>
										Message:
										<br>
										<?php
											print($row_data["message"]);
										?>
									</li>
									<li>
										Name:
										<br>
										<?php
											print($row_data["name"]);
										?>
									</li>
								</ul>
							</li>
						<?php
						} //while($num_rows >= $x);
						?>
						<li class="buttons">
							<input name="New message" type="button" value="New Message" onclick="location.href='index.php?page=messaging'"/>
					</ul>
			</div>
		</div>
		</form>
	</body>
</html>