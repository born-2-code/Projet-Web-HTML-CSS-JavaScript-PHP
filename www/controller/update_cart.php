<?php 

	session_start();
	if(isset($_SESSION["cart"]) && isset($_GET['id']){
		$cart=$_SESSION["cart"];
		$cart[htmlspecialchars($_GET('id'))]=1;
		$_SESSION["cart"]=$cart;
	}
?>