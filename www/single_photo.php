<?php

include 'controller/single_photo_controller.php';

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Photo</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Style Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<style>
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
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
						<li><a href="activities.php">Activity</a></li>
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
				<h1><a href="index.html">PHOTO</a></h1>
				<p><label class="of"></label>LET'S MAKE A PERFECT STYLE<label class="on"></label></p>
			</div>
		</div>
	</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

			<div class="single">
			<?php echo $admin_buttons; ?>
			   <img style="border-radius: 10px;" src=<?php echo '"'.$photo['URL'].'"'; ?> width="300px" height="300px" class="img-responsive" alt="">
			    <div class="b-bottom"> 
			      <h5 class="top"></h5>

			      <p><?php echo $activity_date; ?></p><br>

			        <?php echo $html_gallery; ?>
				 
				</div>
			 </div>
			  

				<div class="response">
					<h4>Commentaires</h4>

					<?php echo $html_comments; ?>

				</div>	
				<div class="coment-form">
					<h4>Laisse ton commentaire !</h4>
					<form action="single_photo.php" method="get">
						<textarea name="content" required="" placeholder="Ton commentaire..."></textarea>
						<input type="hidden" name="insert_comment" value="">
						<input type="hidden" name="idp" value="<?php echo $_GET['id'];?>">
						<input type="submit" value="Publier">
					</form>
				</div>	
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
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
</body>
</html>