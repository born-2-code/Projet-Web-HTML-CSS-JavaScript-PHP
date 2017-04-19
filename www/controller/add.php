<?php

include 'singleton.php';

if(isset($_GET['thumbnail']) && isset($_GET['Goodie_Name']) && isset($_GET['Goodie_Description']) && isset($_GET['Price']) && isset($_GET['Stock']) && isset($_GET['Sales'])){

	$insert = $conn->prepare("INSERT INTO goodie (Id_Goodie, Goodie_Thumbnail, Goodie_Name, Goodie_Description, Price, Stock, Sales) VALUES (NULL, Goodie_Thumbnail = :thumbnail, Goodie_Name = :Goodie_Name, Goodie_Description = :Goodie_Description, Price = :Price, Stock = :Stock, Sales = :Sales);
	");
	$insert->execute(array(
		':thumbnail' => htmlspecialchars($_GET['thumbnail']),
		':Goodie_Name' => htmlspecialchars($_GET['Goodie_Name']),
		':Goodie_Description' => htmlspecialchars($_GET['Goodie_Description']),
		':Price' => htmlspecialchars($_GET['Price']),
		':Stock' => htmlspecialchars($_GET['Stock']),
		':Sales' => htmlspecialchars($_GET['Sales'])
	));
	
	header('Location: shop_CESI.php');
}


?>