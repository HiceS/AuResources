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
<meta charset="utf-8">
<link rel="icon" type="img/png" href="images/favicon.png" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700,900" rel="stylesheet">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="chair_css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=0"></script>
<script src="js/jquery.dropotron-1.2.js"></script>
<script src="js/init.js"></script>
<noscript>
<link rel="stylesheet" href="chair_css/5grid/core.css">
<link rel="stylesheet" href="chair_css/5grid/core-desktop.css">
<link rel="stylesheet" href="chair_css/5grid/core-1200px.css">
<link rel="stylesheet" href="chair_css/5grid/core-noscript.css">
<link rel="stylesheet" href="chair_css/style.css">
<link rel="stylesheet" href="chair_css/style-desktop.css">
</noscript>
<!--[if lte IE 8]>
<link rel="stylesheet" href="css/ie8.css">
<![endif]-->

<div id="header-wrapper" class="wrapper">
  <div class="5grid-layout">
    <div class="row">
      <div class="12u">
        <div id="header">
          <div id="logo">
            <h1><a class="mobileUI-site-name"><font color="#FFD119">Au</font>Society</a></h1>
            <span class="byline">In gold we trust</span>
		  </div>
          <nav id="nav" class="mobileUI-site-nav">
		  <div id="user">
			<?php
			
			require("common.php");
			
			//if(empty($_SESSION['user'])){
			?>
				<p> 
					<a href="index.php?page=login"><font color="#fff">Login</font></a>
					<br>
					or
					<br>
					<a href="index.php?page=register"><font color="#fff">Sign Up</font></a>
				</p>
				
			
			<?php // }  ?>
			<?php
			
		//	else{
			?>
<!--			
			<p>
					Hello
					<br>
					<?php echo htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8'); ?>
					<br>
					<a href="logout.php" STYLE="text-decoration: none"><font color="#fff">Logout</font></a>
				</p>
				-->
			<?php // } ?>
		</div>
            <ul>
              <li class="current_page_item"><a href="index.php">Home</a></li>
              <li> <span>User Options</span>
                <ul style="background-color: #7C7C7C">
                  <li><a href="index.php?page=edit">Edit account info</a></li>
                  <li><a href="index.php?page=logout">Logout</a></li>
                </ul>
              </li>
			  <li><a href="index.php?page=photo_center">Photo Center</a></li>
              <li><a href="index.php?page=merchandise">Merchandise</a></li>
			  <li> <span>Member Services</span>
				<ul style="background-color: #7C7C7C">
					<li><a href="index.php?page=pbank">Private Bank</a></li>
					<li><a href="index.php?page=landclaims">Land and Claims</a></li>
					<li><a href="index.php?page=landclaims">Nome Gold Adventures</a></li>
					<li><a href="index.php?page=photo_center">Message Center</a></li>
				</ul>
			  </li>
			</ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

</head>
	<body>        
		<div id="main-wrapper">
			<?php 				
				if ($pagename == "home") {
					include("content/mainpage.php");
				} elseif ($pagename == "login") {
					include("content/login.php");
				} elseif ($pagename == "private") {
					include("content/private.php");
				} elseif ($pagename == "register") {
					include("content/register.php");
				} elseif ($pagename == "insert") {
					include("content/insert.php");
				} elseif ($pagename == "messaging") {
					include("content/messaging.php");
				} elseif ($pagename == "mes_insert") {
					include("content/mes_insert.php");
				} elseif ($pagename == "logout") {
					include("content/logout.php");
				} elseif ($pagename == "message_center") {
					include("content/message_center.php");
				} elseif ($pagename == "photo_center") {
					include("content/photos.php");
				} elseif ($pagename == "merchandise") {
					include("content/merchandise.php");
				}
			?>	
        </div>
    </body>
	<footer>
		<div id="footer-wrapper" class="wrapper" style="height: 200px">
			<div style="float: right">
				<a>Certified by AuAlaska mining corporation</a>
				<br>
				<a>For more information you may email : email@email.com</a>
				<br>
				<a>If you see something wrong with the website please email: shawnhice@gmail.com</a>
			</div>
		</div>
	</footer>
</html> 