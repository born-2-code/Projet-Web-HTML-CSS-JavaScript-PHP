<?php

// =====================    SHOP CONTROLLER     ========================= //



include_once 'controller/shop_controller.php';

		
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SHOP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
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
		
		
		function addtocart(id){
			var qty = document.getElementById(id).value;
			location.href = "controller/update_cart.php?id="+id+"&qty="+qty;
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
								<li><a href="cart.php"><img src="images/panner.jpg" alt=""></a></li>
								<li><a href="activities.php">Activity</a></li>
								<li class="active act"><a href="shop.php">Shop</a></li>
								<li><a href="profile.php">Profile</a></li>
								<li><a href="index.php">Logout</a></li>
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
											
												<input type="number" min="1" max="99" name="nombre" id="'.$result['Id_Goodie'].'" value="1"> 
												';

												if($admin == '1'){
													echo 
													'<button class="add_to_cart" id="add_to_cart" onClick="addtocart(\''.$result['Id_Goodie'].'\')">Add to cart</button></br>
													<button class="add_to_cart" id="add_to_cart" onClick="goto(\'controller/update_form.php?id='.$result['Id_Goodie'].'\')">Update Product</button>
													<button class="add_to_cart" id="add_to_cart" onClick="goto(\'controller/delete.php?id='.$result['Id_Goodie'].'\')">Remove Product</button>';

												}else{
													echo 
													'<button class="add_to_cart" id="add_to_cart" onClick="addtocart(\''.$result['Id_Goodie'].'\')">Add to cart</button></br>';
												}


												echo '</br>
										
										</div></div>';
									}
								?>
								<div class="clearfix"> </div> </br>
							</div>

							<div class="clearfix"> </div>  </br>
							
							<nav class="test" >

							<?php 



							if($admin == '1'){

									echo '<button class="add_to_cart" id="add_to_cart" onClick="location.href=\'controller/add_form.php\'">Add a Product</button></br>';

							}


							?>

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
						<p>© 2017 BDE CESI. All rights reserved | Design by Exia CESI Orleans | <a href="legal_notices.html">Legal Notices</a></p>
					</div>
				</div>
	</body>
</html>