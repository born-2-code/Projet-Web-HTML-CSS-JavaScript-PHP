<?php

// Include file singleton.php
include_once 'singleton.php';


// If form is filled
if(isset($_GET['id'])){

// Prepare a delete in database
	$delete_goodie = $conn->prepare("DELETE FROM Goodie where Id_Goodie = :id");

// Execute the request
	$delete_goodie->execute(array(
		':id' => htmlspecialchars($_GET['id'])
	));
}

// Redirect to the page shop_CESI.php
	header('Location: ../shop.php');
?>