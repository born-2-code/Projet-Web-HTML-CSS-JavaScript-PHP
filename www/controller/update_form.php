<?php 

// Include file singleton.php
include_once 'singleton.php';

// Prepare the Select
$get_all_goodies = $conn->prepare("SELECT * FROM Goodie WHERE Id_Goodie=:Id_Goodie");

// Diplay all the values from the table with the good id 
$get_all_goodies->execute(array(
':Id_Goodie' => htmlspecialchars($_GET['id'])
));

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Shop Update</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="container">  
	
	<?php
		// Retrieve the result and put it in var	
		$result=$get_all_goodies->fetch();
	
		echo	'<form action="update.php" method="GET">';
		echo		'<fieldset>';
		echo		  'Goodie Thumbnail :<br>';
		echo		  '<input type="text" name="thumbnail" value="'.$result['Goodie_Thumbnail'].'" required>';
		echo		  '<br>';
		echo		  'Goodie Name :<br>';
		echo		  '<input type="text" name="Goodie_Name" value="'.$result['Goodie_Name'].'" required>';
		echo		  '<br>';
		echo		  'Goodie Description :<br>';
		echo		  '<input type="text" name="Goodie_Description" value="'.$result['Goodie_Description'].'" required>';
		echo		  '<br>';
		echo		  'Price :<br>';
		echo		  '<input type="text" name="Price" value="'.$result['Price'].'" required>';
		echo		  '<br>';
		echo		  'Stock :<br>';
		echo		  '<input type="text" name="Stock" value="'.$result['Stock'].'" required>';
		echo		  '<br>';
		echo		  'Sales :<br>';
		echo		  '<input type="text" name="Sales" value="'.$result['Sales'].'" required>';
		echo		  '<br>';
		echo		  '<input type="text" name="Id_Goodie" value="'.$result['Id_Goodie'].'" hidden>';
		echo		  '<br>';
		echo		  '<input type="submit" value="Update">';
		echo		'</fieldset>';
		echo	'</form>'; 
	?>
	
	
	</div>
  
  
</body>
</html>
