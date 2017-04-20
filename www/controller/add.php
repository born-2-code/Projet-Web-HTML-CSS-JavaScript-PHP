<?php

// Include file singleton.php
include_once 'singleton.php';


// If form is filled
if(isset($_POST['Goodie_Name']) && isset($_POST['Goodie_Description']) && isset($_POST['Price']) && isset($_POST['Stock']) && isset($_POST['Sales'])){


// Prepare an insert in database 
	$insert = $conn->prepare("INSERT INTO Goodie (Id_Goodie, Goodie_Thumbnail, Goodie_Name, Goodie_Description, Price, Stock, Sales) VALUES (NULL, :thumbnail, :Goodie_Name, :Goodie_Description, :Price, :Stock, :Sales);
	");

	
	$photo_path = 'images/goodie/'.$_FILES['thumbnail']['name'];

	$relative_path = '../'.$photo_path;

	move_uploaded_file($_FILES['thumbnail']['tmp_name'], $relative_path);

// Execute the request 
	$insert->execute(array(
		':thumbnail' => $photo_path,
		':Goodie_Name' => htmlspecialchars($_POST['Goodie_Name']),
		':Goodie_Description' => htmlspecialchars($_POST['Goodie_Description']),
		':Price' => htmlspecialchars($_POST['Price']),
		':Stock' => htmlspecialchars($_POST['Stock']),
		':Sales' => htmlspecialchars($_POST['Sales'])
	));

	


// Redirect to the page shop_CESI.php	

	header('Location: ../shop.php');
}


?>