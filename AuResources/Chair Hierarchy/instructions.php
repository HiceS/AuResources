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
<div id="intro-wrapper" class="wrapper wrapper-style1">
  <div class="title">How to move up the list: </div>
  <div class="5grid-layout">
    <div class="row">
      <div class="12u">
        <section id="intro">
          <p class="style1">So in case you were wondering what this is all about ...</p>
          <p class="style2">The Chair Hierarchy defines who is more obligated to sit in the very few chairs in the shop, it shall be followed now and always.</a> </p>
		  <p class="style2">It is the Law Of The Chairs</a> </p>
          <p class="style3">It's only <strong>fair</strong>, to <strong>You</strong> and <strong>Your</strong> fellow shop mates!</p>
        </section>
      </div>
    </div>
  </div>
</div>
</body>
</html>