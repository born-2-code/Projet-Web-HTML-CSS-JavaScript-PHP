<?php 

//Initialize a session
	session_start();

	if(isset($_GET['id']) && isset($_GET['qty'])){
		
		$_SESSION["cart"][$_GET['id']]=$_GET['qty'];
		header('Location: ../shop.php');
	}
?>