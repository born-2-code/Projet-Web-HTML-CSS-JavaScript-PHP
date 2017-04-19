<?php

include 'singleton.php';

if(isset($_GET['id'])){

	$delete_goodie = $conn->prepare("DELETE FROM goodie where Id_Goodie = :id");
	
	$delete_goodie->execute(array(
		':id' => htmlspecialchars($_GET['id'])
	));
}

	header('Location: shop_CESI.php');
?>