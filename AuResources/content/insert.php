<?php
require("common.php");
    if(!empty($_POST))
    {
        // Ensure that the user has entered a non-empty username
        if(empty($_POST['username']))
        {
            // Note that die() is generally a terrible way of handling user errors
            // like this.  It is much better to display the error with the form
            // and allow the user to correct their mistake.  However, that is an
            // exercise for you to implement yourself.
            die("Please enter a username.");
        }
        
        // Ensure that the user has entered a non-empty password
        if(empty($_POST['password']))
        {
            die("Please enter a password.");
        }
        if(empty($_POST['conpassword']))
        {
            die("Please enter a conformation password.");
        }
        // We will use this SQL query to see whether the username entered by the
        // user is already in use.  A SELECT query is used to retrieve data from the database.
        // :username is a special token, we will substitute a real value in its place when
        // we execute the query.
        $query = "
            SELECT
                1
            FROM login
            WHERE
                username = :username
        ";
        
        // This contains the definitions for any special tokens that we place in
        // our SQL query.  In this case, we are defining a value for the token
        // :username.  It is possible to insert $_POST['username'] directly into
        // your $query string; however doing so is very insecure and opens your
        // code up to SQL injection exploits.  Using tokens prevents this.
        // For more information on SQL injections, see Wikipedia:
        // http://en.wikipedia.org/wiki/SQL_Injection
        $query_params = array(
            ':username' => $_POST['username']
        );
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
        // The fetch() method returns an array representing the "next" row from
        // the selected results, or false if there are no more rows to fetch.
        $row = $stmt->fetch();
        
        // If a row was returned, then we know a matching username was found in
        // the database already and we should not allow the user to continue.
        if($row)
        {
            die("This username is already in use");
        }
        
        
        // An INSERT query is used to add new rows to a database table.
        // Again, we are using special tokens (technically called parameters) to
        // protect against SQL injection attacks.
        $query = "
            INSERT INTO login (
                username,
				name,
				email,
                password,
                salt,
				sint
            ) VALUES (
                :username,
				:name,
				:email,
                :password,
                :salt,
				:sint
				
            )
        ";
        
        // A salt is randomly generated here to protect again brute force attacks
        // and rainbow table attacks.  The following statement generates a hex
        // representation of an 8 byte salt.  Representing this in hex provides
        // no additional security, but makes it easier for humans to read.
        // For more information:
        // http://en.wikipedia.org/wiki/Salt_%28cryptography%29
        // http://en.wikipedia.org/wiki/Brute-force_attack
        // http://en.wikipedia.org/wiki/Rainbow_table
		if($_POST['password'] == $_POST['conpassword']) {
			$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
			
			// This hashes the password with the salt so that it can be stored securely
			// in your database.  The output of this next statement is a 64 byte hex
			// string representing the 32 byte sha256 hash of the password.  The original
			// password cannot be recovered from the hash.  For more information:
			// http://en.wikipedia.org/wiki/Cryptographic_hash_function
			$password = hash('sha256', $_POST['password'] . $salt);
			
			// Next we hash the hash value 65536 more times.  The purpose of this is to
			// protect against brute force attacks.  Now an attacker must compute the hash 65537
			// times for each guess they make against a password, whereas if the password
			// were hashed only once the attacker would have been able to make 65537 different 
			// guesses in the same amount of time instead of only one.
			for($round = 0; $round < 65536; $round++)
			{
				$password = hash('sha256', $password . $salt);
			}
			
			// Here we prepare our tokens for insertion into the SQL query.  We do not
			// store the original password; only the hashed version of it.  We do store
			// the salt (in its plaintext form; this is not a security risk).
			$query_params = array(
				':username' => $_POST['username'],
				':name' => $_POST['name'],
				':email' => $_POST['email'],
				':password' => $password,
				':salt' => $salt,
				':sint' => $_POST['sint']
			);
			
			try
			{
				// Execute the query to create the user
				$stmt = $db->prepare($query);
				$result = $stmt->execute($query_params);
			}
			catch(PDOException $ex)
			{
				// Note: On a production website, you should not output $ex->getMessage().
				// It may provide an attacker with helpful information about your code. 
				die("Failed to run query: " . $ex->getMessage());
			}
			header("Location: /index.php?page=login");
		}
		else {
			die("Password don't match.\nPleas try again");
		}
        // This redirects the user back to the login page after they register
        
        // Calling die or exit after performing a redirect using the header function
        // is critical.  The rest of your PHP script will continue to execute and
        // will be sent to the user if you do not die or exit.
    }
	
?>
