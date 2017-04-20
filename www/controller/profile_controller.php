<?

// =====================    PROFILE CONTROLLER     ========================= //

include 'singleton.php';

setlocale(LC_TIME, 'fr_FR.utf8','fra');

if(isset($_SESSION['id'])){ // if user is logged

	$get_user_info = $conn->prepare("SELECT `Avatar`, `User_Name`, `Surname`, `Birth_date`, `Email`, `Studies`, `User_Status` FROM `Users` WHERE Id_User = :id");

	$get_user_info->execute(array(':id' => htmlspecialchars($_SESSION['id'])));

	$result = $get_user_info->fetch();

	$avatar = $result['Avatar'];
	$surname = $result['Surname'];
	$name = $result['User_Name'];
	$studies = $result['Studies'];
	$email = $result['Email'];

	// === Load user activities ===//

	$get_activities = $conn->prepare("SELECT * FROM `PARTICIPATE` INNER JOIN Activity ON PARTICIPATE.Id_Activity = Activity.Id_Activity WHERE Id_User = :id");

	$get_activities->execute(array(
		':id' => htmlspecialchars($_SESSION['id'])
	));

	$activities = $get_activities->fetchAll();
	$html_activities = "";

	foreach ($activities as $activity){
							
		$html_activities .= '

		<table class="activities" style="width:100%; border-spacing: 10px;">
		  <tr>
		  <td style="width: 25%;"><a>'.$activity['Activity_Name'].'</a></td>
		    <td style="width: 25%;">'.substr($activity['Date_Event'],0,10).'</td> 
		    <td style="width: 25%;">'.substr($activity['Date_Event'],10,6).'</td>
		    <td style="width: 25%;">'.$activity['Number_Of_Participants'].' Participants | '.$activity['Remaining_Places'].' Places disponibles</td>
		  </tr>
		  <tr>
		    <td style="width: 25%;">'.$activity['Activity_Description'].'</td>
		    <td style="width: 25%;"></td> 
		    <td style="width: 25%;"></td>
		    <td style="width: 25%;"><button onclick="location.href=\'activities.php?remove&id_activity='.$activity['Id_Activity'].'\'" type="button" class="add_to_cart">Me désinscrire</button></td>
		  </tr>
		</table>
		  <hr>';
	}

	//=== Load user orders ===//

	$get_orders = $conn->prepare("SELECT `Id_Order`, `Date_Order`, `Total_Cost`, `Order_Status`, `Id_Content` FROM `Orders` WHERE Id_User = :id");

	$get_orders->execute(array(
		':id' => htmlspecialchars($_SESSION['id'])
	));

	$orders = $get_orders->fetchAll();
	$html_orders = "";

	foreach ($orders as $order) {
		
		$html_orders .='
	
		<table class="activities" style="width:100%; border-spacing: 10px;">
		  <tr>
		    <td style="width: 25%;"><a>Commande numéro '.$order["Id_Order"].'</a></td>
		    <td style="width: 25%;">'.$order["Total_Cost"].'€</td> 
		    <td style="width: 25%;">'.$order["Date_Order"].'</td>
		    <td style="width: 25%;">'.$order["Order_Status"].'</td>
		  </tr>
		</table>';

		$get_products = $conn->prepare("SELECT * FROM `Order_Content` INNER JOIN Goodie ON Order_Content.Id_Product = Goodie.Id_Goodie WHERE Id_Order = :id");
		$get_products->execute(array(':id' => $order["Id_Order"]));
		$order_products = $get_products->fetchAll();

		foreach ($order_products as $order_product){

			$html_orders .= $order_product['Amount'].' <img style="border-radius: 10px;" width="60" src="'.$order_product['Goodie_Thumbnail'].'"><br>';
			
		}

		$html_orders .='<hr>';

	}


}else{ // redirects to login

	header("Location: index.php");

}


?>