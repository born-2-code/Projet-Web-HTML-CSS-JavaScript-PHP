<?php

include_once 'controller/singleton.php';

$products = "";
$total_price=5;

if(isset($_SESSION['cart'])){
	
	$get_product_info = $conn->prepare("SELECT * FROM `Goodie` WHERE Id_Goodie = :id");
	

	foreach($_SESSION['cart'] as $id => $qty){
		
		$get_product_info->execute(array(':id' => $id));
		
		$result = $get_product_info->fetch();
		
		$products .= '<tr id="products_'.$result['Id_Goodie'].'" class="productitm">
						<td><img src="'.$result['Goodie_Thumbnail'].'" class="thumb"></td>
						<td><input type="number" id="qty" value="'.$qty.'" readonly></td>
						<td>'.$result['Goodie_Description'].'</td>
						<td>'.$result['Price'].'</td>
						<td><span class="remove"><img src="images/delete.jpg" alt="X" onclick="remove('.$result['Id_Goodie'].');"></span></td>
					</tr>';

		$total_price = $total_price+($result['Price']*$qty);
	}
}




?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>CART</title>
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
		function remove(id){
			location.href = "controller/delete_cart.php?id="+id;
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
					<h1><a href="index.html">CART</a></h1>
					<p><label class="of"></label>LET'S MAKE A PERFECT STYLE<label class="on"></label></p>
				</div>
			</div>
		</div>
		
	<div class="technology">
		<div class="container">
			<div class="col-md-9 technology-left">
				<div class="page">
					<div class="short-heading">
						<h2 class="w3">CART</h2>
					</div>

					<div id="w">
						<table id="cart">
							<thead>
							  <tr>
								<th class="first">         Photo</th>
								<th class="second">Qty</th>
								<th class="third">                                                             Product</th>
								<th class="fourth">      Cost</th>
								<th class="fifth">&nbsp;</th>
							  </tr>
							</thead>
							<tbody>
								<!-- shopping cart contents -->
								
								<?php echo $products;?>
								

								<!-- tax + subtotal -->
								<tr class="extracosts">
									<td class="light">Shipping &amp; Tax</td>
									<td colspan="2" class="light"></td>
									<td>5€00</td>
									<td>&nbsp;</td>
								</tr>
								
								<?php
									echo	'<tr class="totalprice">';
									echo	'<td class="light">Total:</td>';
									echo	'<td colspan="2">&nbsp;</td>';
									echo	'<td colspan="2"><input type="number" id="price" value="'.$total_price.'" readonly></td>';
									echo	'</tr>';
								?>
								  
								<!-- checkout btn -->
								<tr class="checkoutrow">
									<?php echo '<td onclick="location.href=\'controller/order_add.php?id='.$_SESSION['id'].'&cost=120\'" colspan="5" class="checkout"><button id="submitbtn">Checkout Now!</button></td>'; ?>
								</tr>
							</tbody>
						</table>
					</div>
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