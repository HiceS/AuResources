<?php

	$pagename = htmlspecialchars($_GET["page"]);

	if ($pagename == "") {
		$pagename = "home";
	}

?>
<!DOCTYPE html>
<html>

    <head>
        <title>AuResources</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
		<meta charset="utf-8">
		<link rel="icon" type="img/png" href="images/favicon.png" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,900" rel="stylesheet">	
		<script src="5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=0"></script>
		<noscript>
		<link rel="stylesheet" href="css/5grid/core.css">
		<link rel="stylesheet" href="css/5grid/core-desktop.css">
		<link rel="stylesheet" href="css/5grid/core-1200px.css">
		<link rel="stylesheet" href="css/5grid/core-noscript.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style-desktop.css">
		</noscript>
		<div>
			<div id="header">
				<ul>
				  <li class="current_page_item"><a href="index.php">Home</a></li>
				  <li> <span>User Options</span>
					<ul>
					  <li><a href="index.php?page=edit">Edit account info</a></li>
					  <li><a href="logout.php">Logout</a></li>
					  <!--
					  <li> <span>Sed consequat</span>
						<ul>
						  <li><a href="#">Lorem dolor</a></li>
						  <li><a href="#">Amet consequat</a></li>
						  <li><a href="#">Magna phasellus</a></li>
						  <li><a href="#">Etiam nisl</a></li>
						  <li><a href="#">Sed feugiat</a></li>
						</ul>
					  </li>
					  -->
					</ul>
				  </li>
				  <li><a href="chairs.php">Chair Bio</a></li>
				  <li><a href="leaderboard.php">LeaderBoards</a></li>
				  <li><a href="instructions.php">How to Move up</a></li>
				</ul>
			</div>
		</div>
    </head>
    
    <body>
    
        <header id="head" >
			<p><a href="index.php?page=login" style="text-decoration:none"><span id="main">AuResources</span></a></p>
			<p><a href="logout.php"><span id="logout">Logout</span></a></p>
        </header>
        
        <div id="main-wrapper">
			
			<?php 				
				if ($pagename == "home") {
					include("mainpage.php");
				} elseif ($pagename == "login") {
					include("login.php");
				} elseif ($pagename == "private") {
					include("private.php");
				} elseif ($pagename == "register") {
					include("register.php");
				} elseif ($pagename == "insert") {
					include("insert.php");
				}
			?>
			
        </div>
    </body>
</html> 