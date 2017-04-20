<?php

include 'controller/activities_controller.php';

?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Activités</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel='stylesheet' type='text/css' />	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</head>

	<style type="text/css">

		#image {
		  flex-basis: 150px;
		}

		#text {
		  display: flex;
		  flex-grow: 1;
		  padding-left: 20px;
		  flex-wrap: wrap;
		}

		#text>h2,
		#text>p {
		  width: 50%;
		  margin: 0;
		}

		#text .right {
		  text-align: right;
		}
		#text .left {
		  text-align: left;
		}

		input{
			width: 80%;
		}



	</style>
	
	<body>
		<div class="header" id="ban">
			<div class="container">
				<div class="head-left"></div>
				<div class="header_right">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-7" id="link-effect-7">
							<ul class="nav navbar-nav">
								<li><a href="cart.php"><img src="images/panner_active.jpg" alt=""></a></li>
								<li class="active act"><a href="index.php">Activity</a></li>
								<li><a href="shop.php">Shop</a></li>
								<li><a href="profile.php">Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
		<!--start-main-->
		<div class="header-bottom">
			<div class="container">
				<div class="logo">
					<h1><a href="index.html">ACTIVITES</a></h1>
					<p><label class="of"></label>LET'S MAKE A PERFECT STYLE<label class="on"></label></p>
				</div>
			</div>
		</div>
		
	<div class="technology">


	<?php echo $html_activities; ?>


	</div>
	
			<div class="footer">
			<div class="container">

				<div class="clearfix"></div>
			</div>
		</div>
		<div class="copyright">
					<div class="container">
						<p>© 2017 BDE CESI. All rights reserved | Design by Exia CESI Orleans | <a href="legal_notices.html">Legal Notices</a></p>
					</div>
				</div>
		</div>
	</body>
</html>