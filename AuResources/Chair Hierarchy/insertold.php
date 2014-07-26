<?php

    // First we execute our common code to connection to the database and start the session
	require("common.php");
    
    
    // This if statement checks to determine whether the edit form has been submitted
    // If it has, then the account updating code is run, otherwise the form is displayed
    if(empty($_SESSION['user'])) {
	if(!empty($_POST))
    {
        
            // Define our SQL query
             $query = "
            SELECT
                username,
                password,
				salt
            FROM login
            WHERE
                username = :username
        ";
            
            // Define our query parameter values
			$query_params = array(
            ':username' => $_POST['username']
			);
			
			$username = $_POST['username'];
			
            try
            {
                // Execute the query
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            catch(PDOException $ex)
            {
                // Note: On a production website, you should not output $ex->getMessage().
                // It may provide an attacker with helpful information about your code. 
                die("An Error has Occurred Querying the database"  . $ex->getMessage());
            }
			
         
            // Retrieve results (if any)
            $row = $stmt->fetch();
            if($row)
            {
                die("This username is already in use");
            }
        
		
        
        // If the user entered a new password, we need to hash it and generate a fresh salt
        // for good measure.
		
        if((!empty($_POST['password'])) && (!empty($_POST['conpassword'])))
        {
			if(($_POST['password']) == ($_POST['conpassword']))
			{
				$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
				$password = hash('sha256', $_POST['password'] . $salt);
				for($round = 0; $round < 65536; $round++)
				{
					$password = hash('sha256', $password . $salt);
				}
			}
			else{
				die("Your Passwords do not match");
				 header("Location: register.php");
			}
        }
		try{
			$sql = "INSERT INTO login (username, password, salt)
				VALUES ($username, $password, $salt)");
		}
		catch(PDOException $ex){
			die("An Error has Occurred while updating database "  . $ex->getMessage());
		}
        
        header("Location: index.php");
        die("Redirecting to index.php");
    }
	}
	else {
		header("Location: index.php?page=login");
		die("Redirecting to: index.php?page=login");
	}
?>
