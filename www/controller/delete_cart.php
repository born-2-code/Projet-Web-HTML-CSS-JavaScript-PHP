<?php 

//Initialize a session
	session_start();

	if(isset($_GET['id'])){
		
		unset($_SESSION["cart"][$_GET['id']]);

		header('Location: ../cart.php');
	}
?>