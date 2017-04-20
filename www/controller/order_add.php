<?php

// Include file singleton.php
include_once 'singleton.php';



if(isset($_GET['id']) && isset($_GET['cost'])){


	// Prepare an insert in database


	$insert = $conn->prepare("INSERT INTO `Orders`(`Id_Order`, `Date_Order`, `Total_Cost`, `Order_Status`, `Id_User`, `Id_Content`) VALUES (NULL, '2017-04-12', :cost, 'Preparation', :id, '1');
	");

	// Execute the request 

	$insert->execute(array(
		':id' => $_GET['id'],
		':cost' => $_GET['cost']
	));

	// id of last order
	$get_id_order = $conn->prepare("SELECT MAX(`Id_Order`) AS Id_Order FROM `Orders` WHERE `Id_User` = :id");
	$get_id_order->execute(array(':id' => $_GET['id']));
	$id = $get_id_order->fetch();

	$id_order = $id['Id_Order'];

	$order_products = $_SESSION['cart'];

	$insert_order_content = $conn->prepare("INSERT INTO `Order_Content`(`Id_Content`, `Id_Order`, `Id_Product`, `Amount`) VALUES (NULL,:ido,:idp,:amount)");

	foreach ($order_products as $product => $qty) {

		$insert_order_content->execute(array(
			':ido' => $id_order,
			':idp' => $product, 
			':amount' => $qty
		));

	}

	unset($_SESSION['cart']);

	// Redirect to the page shop.php	
	
	header('Location: ../shop.php');
}


?>