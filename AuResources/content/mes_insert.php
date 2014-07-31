<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
require("common.php");
if(empty($_SESSION['user']))
{
	// If they are not, we redirect them to the login page.
	header("Location: index.php?page=login");
	
	// Remember that this die statement is absolutely critical.  Without it,
	// people can view your members-only content without logging in.
	die("Redirecting to login.php");
}
else
{
    if(!empty($_POST))
    {
        if(empty($_POST['title']))
        {
            // Note that die() is generally a terrible way of handling user errors
            // like this.  It is much better to display the error with the form
            // and allow the user to correct their mistake.  However, that is an
            // exercise for you to implement yourself.
            die("Please enter a title.");
        }

        if(empty($_POST['message']))
        {
            die("Please enter a message.");
        }
        // We will use this SQL query to see whether the username entered by the
        // user is already in use.  A SELECT query is used to retrieve data from the database.
        // :username is a special token, we will substitute a real value in its place when
        // we execute the query.
        $query = "
            SELECT
                1
            FROM messaging
            WHERE
                title = :title
        ";
   
        $query_params = array(
            ':title' => $_POST['title']
        );
        try{
            // These two statements run the query against your database table.
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            die("Failed to run query: " . $ex->getMessage());
        }
        // The fetch() method returns an array representing the "next" row from
        // the selected results, or false if there are no more rows to fetch.
        $row = $stmt->fetch();
        
        if($row)
        {
            die("This title is already in use");
        }
		
		$name = $_SESSION['user']['name'];
		
        $query = "
            INSERT INTO messaging (
                title,
				message,
				name
            ) VALUES (
                :title,
				:message,
				:name
				
            )
        ";
			$query_params = array(
				':title' => $_POST['title'],
				':message' => $_POST['message'],
				':name' => $name
			);
			
			try
			{
				$stmt = $db->prepare($query);
				$result = $stmt->execute($query_params);
			}
			catch(PDOException $ex)
			{
				die("Failed to run query: " . $ex->getMessage());
			}
			header("Location: /index.php?page=home");
    }
}
	
?>
