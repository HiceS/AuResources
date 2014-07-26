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
<!DOCTYPE HTML>
<html>
<head>
<title>Chair Hierarchy</title>
<meta charset="utf-8">
<link rel="icon" type="img/png" href="images/favicon.png" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,900" rel="stylesheet">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="chair_css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=0"></script>
<script src="js/jquery.dropotron-1.2.js"></script>
<script src="js/init.js"></script>
<noscript>
<link rel="stylesheet" href="css/5grid/core.css">
<link rel="stylesheet" href="css/5grid/core-desktop.css">
<link rel="stylesheet" href="css/5grid/core-1200px.css">
<link rel="stylesheet" href="css/5grid/core-noscript.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style-desktop.css">
</noscript>
<!--[if lte IE 8]>
<link rel="stylesheet" href="css/ie8.css">
<![endif]-->
</head>
<body class="homepage">
<div id="header-wrapper" class="wrapper">
  <div class="5grid-layout">
    <div class="row">
      <div class="12u">
        <div id="header">
          <div id="logo">
            <h1><a class="mobileUI-site-name">The Chair Hierarchy</a></h1>
            <span class="byline">Version 2.0 and getting better</span>
		  </div>
          <nav id="nav" class="mobileUI-site-nav">
		  <div class="user" style="float: right;">
			<p>Wilkommen:
			<br>
			<?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			Total Points:
			<br>
			<?php echo htmlentities($_SESSION['user']['calicas'], ENT_QUOTES, 'UTF-8'); ?>
			<br>
			<a href="logout.php" >Logout</a>
			</p>
		  </div>
            <ul>
              <li class="current_page_item"><a href="chairhierarchy.php">Home</a></li>
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
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="wrapper wrapper-style2">
  <div class="title">The List</div>
  <div class="5grid-layout">
    <div class="row">
      <div class="12u">
<!--     <div id="main"> <a class="image image-full" width="200px" height="200px"> <img src="images/seal_of_approval.jpg"></a>
		</div> 	
-->		
          <div style="font-size: 10pt; font-weight: bold;">
        	<div class="entry" align="center">
			<section id="intro">
			<p class="style4">
          		<ol>
            		<li>
             			<strong>Carlo</strong>
            		</li>
            		<li>
              			<strong>Misc... Mentors (not including Alex)</strong>
            		</li>
            		<li>
              			<strong>Griffen</strong>
            		</li>
					<li>
              			<strong>Girls (assuming they do not chair hog (verified by Shawn , Jackson , or Griffen))</strong>
            		</li>
                    <li>
                      	<strong>Bryce - Ryan (cause we love them equally)</strong>
                    </li>
                    <li>
                      	<strong>Programming Alumni</strong>
                    </li>
                    <li>
                      	<strong>Jackson - Shawn (because he is awesome)</strong>
                    </li>
					<li>
						<strong>Officers</strong>
					</li>
                    <li>
                      	<strong>Crazy Alex (cause we are a little scared of him)</strong>
                    </li>
                    <li>
                      	<strong>Lucas (cause he needs a break every once in a while :) )</strong>
                    </li>
                    <li>
                      	<strong>New programming members</strong>
                    </li>
                    <li>
                      	<strong>Returning members</strong>
                    </li>
                    <li>
                      	<strong>New Members</strong>
                    </li>
          		</ol>
			</section>
			</p>
        	  </div>
    	    </div>
        </div>
      </div>
    </div>
 </div>
</body>
</html>