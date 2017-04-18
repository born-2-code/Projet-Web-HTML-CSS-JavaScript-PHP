<?php 

include 'singleton.php';

$get_all_goodies = $conn->prepare("SELECT * FROM goodie WHERE Id_Goodie=:id");
$get_all_goodies->execute(array(
':id' => htmlspecialchars($_GET['id'])
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
	
		$result=$get_all_goodies->fetch();
		echo 'Goodie Thumbnail : '.$result['Goodie_Thumbnail'].'<br>';
		echo 'Goodie Name : '.$result['Goodie_Name'].'<br>';
		echo 'Goodie Description : '.$result['Goodie_Description'].'<br>';
		echo 'Price : '.$result['Price'].'<br>';
		echo 'Stock : '.$result['Stock'].'<br>';
		echo 'Sales : '.$result['Sales'].'<br>';
	?>
	
	
	<form method="GET">
		<fieldset>
		  Goodie Thumbnail :<br>
		  <input type="text" name="thumbnail" value="" required>
		  <br>
		  Goodie Name :<br>
		  <input type="text" name="Goodie_Name" value="" required>
		  <br>
		  Goodie Name :<br>
		  <input type="text" name="Goodie_Name" value="" required>
		  <br>
		  Goodie Name :<br>
		  <input type="text" name="Goodie_Name" value="" required>
		  <br>
		  Goodie Name :<br>
		  <input type="text" name="Goodie_Name" value="" required>
		  <br>
		  <input type="submit" value="Envoyer via GET">
		</fieldset>
	</form> 
	
	</div>
  
  
</body>
</html>
