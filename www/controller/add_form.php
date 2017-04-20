<?php 

// Include the file singleton.php
include_once 'singleton.php';

// Diplay all the values from the table with the good id 


?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Goodie Adding</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">  
	
	<?php


	
		echo	'<form action="add.php" method="POST" enctype="multipart/form-data">';
		echo		'<fieldset>';
		echo		  'Goodie Thumbnail :<br>';
		echo		  '<input type="file" name="thumbnail" required>';
		echo		  '<br>';
		echo		  'Goodie Name :<br>';
		echo		  '<input type="text" name="Goodie_Name" value="" required>';
		echo		  '<br>';
		echo		  'Goodie Description :<br>';
		echo		  '<input type="text" name="Goodie_Description" value="" required>';
		echo		  '<br>';
		echo		  'Price :<br>';
		echo		  '<input type="text" name="Price" value="" required>';
		echo		  '<br>';
		echo		  'Stock :<br>';
		echo		  '<input type="text" name="Stock" value="" required>';
		echo		  '<br>';
		echo		  'Sales :<br>';
		echo		  '<input type="text" name="Sales" value="" required>';
		echo		  '<br>';
		echo		  '<input type="submit" value="Add">';
		echo		'</fieldset>';
		echo	'</form>'; 
	?>
	
	
	</div>
  
  
</body>
</html>
