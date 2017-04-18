<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['cart'] = '0';

// =====================    SHOP CONTROLLER     ========================= //
include_once 'shop_controller.php';
include_once 'ajaxAction_controller.php';



$get_all_goodies = $conn->prepare("SELECT * FROM goodie");
// $get_all_goodies->execute(array(
			// ':from_m' => $id_user,
			// ':to' => $id_user_to,
			// ':content' => $_GET['message'],
		// ));

$get_all_goodies->execute();

		
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>SHOP</title>
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
	
	<script>
	
		function goto(site){
		
			location.href = site;
			
		}
	
	</script>
	
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
								<li><a href="cart_CESI.html"><img src="images/panner.jpg" alt=""></a></li>
								<li><a href="cart.html">Activity</a></li>
								<li class="active act"><a href="features.html">Shop</a></li>
								<li><a href="travel.html">Profile</a></li>
								<li><a href="fashion.html">Logout</a></li>
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
					<h1><a href="index.html">SHOP</a></h1>
					<p><label class="of"></label>LET'S MAKE A PERFECT STYLE<label class="on"></label></p>
				</div>
			</div>
		</div>

		<!-- technology-left -->
		<div class="technology">
			<div class="container">
				<div class="col-md-9 technology-left">
					<div class="agile-1">
						<div class="featured-services">
							<h2 class="w3">SHOP</h2>
							<div class="featured-services-grids">
								<?php
									while($result=$get_all_goodies->fetch()){
										echo '<div class="col-md-4 featured-services-grid">
											<div class="featured-services-grd">
											<div class="fea-img">
												<img src="'.$result["Goodie_Thumbnail"].'" alt="">
											</div>
											<h4>'.$result["Goodie_Name"].'</h4>
											<h5>'.$result["Price"].'</h5></br>										
											<p>'.$result["Goodie_Description"].'</p>
											
												<input type="number" min="1" max="99" name="nombre" id="amount" value="1"> 
												<button class="add_to_cart" id="add_to_cart" onClick="add_to_cart()">Add to cart</button></br>
												<button class="add_to_cart" id="add_to_cart" onClick="goto(\'update_form.php?id='.$result['Id_Goodie'].'\')">Update Product</button>
												<button class="add_to_cart" id="add_to_cart" onClick="goto(\'delete.php?id='.$result['Id_Goodie'].'\')">Remove Product</button>
											
										</div></div>';
									}
								?>
								<div class="clearfix"> </div> </br>
							</div>

							<div class="clearfix"> </div>  </br>
							
							<nav class="paging">
								<ul class="pagination pagination-lg">
									<li><a href="#" aria-label="Previous"><span aria-hidden="true"><<</span></a></li>
									<li><a href="#">1</a></li>
									<li><a href="#" aria-label="Next"><span aria-hidden="true">>></span></a></li>
								</ul>
							</nav>
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- technology-right -->
			<div class="col-md-3 technology-right"></div>
			<div class="clearfix"></div>
			<!-- technology-right -->
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="copyright">
					<div class="container">
						<p>© 2017 BDE CESI. All rights reserved | Design by Exia CESI Orleans</p>
					</div>
		</div>
	</body>
</html>