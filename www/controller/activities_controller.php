<?

// =====================    ACTIVITIES CONTROLLER     ========================= //

include 'singleton.php';

// IF LIKE

if(isset($_GET['like']) && isset($_GET['activity']) && !isset($_GET['l'])){

	$update_likes = $conn->prepare("UPDATE `Activity` SET Votes=Votes+1 WHERE `Id_Activity` = :ida ");
	$update_likes->execute(array(
		':ida' => htmlspecialchars($_GET['activity'])
	));

	$_SESSION['vote'][$_GET['activity']]="1";

	header('Location: activities.php?l');
}

// IF CLICK ON PARTICIPATE

$add_inscription = $conn->prepare("UPDATE `Activity` SET `Number_Of_Participants`=`Number_Of_Participants`+1 ,`Remaining_Places`=`Remaining_Places`-1 WHERE `Id_Activity` = :ida ");
$remove_inscription = $conn->prepare("UPDATE `Activity` SET `Number_Of_Participants`=`Number_Of_Participants`-1 ,`Remaining_Places`=`Remaining_Places`+1 WHERE `Id_Activity` = :ida ");


if(isset($_GET['participate']) && isset($_GET['id_activity'])){

	$insert = $conn->prepare("INSERT INTO `PARTICIPATE`(`Id_User`, `Id_Activity`) VALUES (:idu, :ida)");
	$insert->execute(array(
		':idu' => $_SESSION['id'],
		':ida' => htmlspecialchars($_GET['id_activity'])
	));
	$add_inscription->execute(array(':ida' => $_GET['id_activity']));
	
	header("Location: activities.php");

// IF CLICK ON UNSUNCRIBE

}else if(isset($_GET['remove']) && isset($_GET['id_activity'])){

	$remove = $conn->prepare("DELETE FROM `PARTICIPATE` WHERE `Id_User` = :idu AND `Id_Activity` = :ida");
	$remove->execute(array(
		':idu' => $_SESSION['id'],
		':ida' => htmlspecialchars($_GET['id_activity'])
	));
	$remove_inscription->execute(array(':ida' => $_GET['id_activity']));
	
	header("Location: activities.php");
}


// DISPLAY ACTIVITIES


$get_activities = $conn->prepare("SELECT * FROM `Activity` WHERE `Date_Event` >= CURDATE()");
$get_past_activities = $conn->prepare("SELECT * FROM `Activity` WHERE `Date_Event` <= CURDATE()");
$check_participation = $conn->prepare("SELECT * FROM `PARTICIPATE` WHERE `Id_User` = :idu AND `Id_Activity` = :ida");

$get_activities->execute();
$get_past_activities->execute();

$activities = $get_activities->fetchAll();
$past_activities = $get_past_activities->fetchAll();

$html_activities = "";

foreach ($activities as $activity) {

	$html_activities .= '<div class="container">
			<div class="col-md-9 technology-left">
				<div class="page">

					<div class="container" style="display: flex; width: 100%;">
					  <div id="image">
					    <a href="single_activity.php?id='.$activity['Id_Activity'].'"><img style="width: 130px; height: 130px; border-radius: 20px;" src="'.$activity['Activity_Thumbnail'].'"></a>
					  </div>
					  <div id="text">
					    <h2>'.$activity['Activity_Name'].'</h2>
					    <p class="right"><strong>'.$activity['Number_Of_Participants'].'</strong> participant(s) | <strong>'.$activity['Remaining_Places'].'</strong> place(s) disponible </p>
					    <p>Descriptif de l\'activité : <strong>'.$activity['Activity_Description'].'</strong> <br> Lieu : <strong>'.$activity['Activity_Place'].'</strong> <br> Date : <strong>'.substr($activity['Date_Event'],0,10).'</strong><br>Heure : <strong>'.substr($activity['Date_Event'],10,6).'</strong><br>'.$activity['Votes'];

					    
					    if(isset($_SESSION['vote'][$activity['Id_Activity']])){

					    	$html_activities .= '

					    <img width="20" src="images/like.png"></p>';

					    }else{

					    	$html_activities .= '

					    <a href="activities.php?like&user='.$_SESSION['id'].'&activity='.$activity['Id_Activity'].'"><img width="20" src="images/like.png"></a></p>';
					    }

					    

					    $html_activities .= '

					    <p class="right">

					    <strong>'.$activity['Activity_Price'].'€</strong><br><br><br><br>';

					    $check_participation->execute(array(
					    	':idu' => $_SESSION['id'],
					    	':ida' => $activity['Id_Activity']
					    ));
					    $participate = $check_participation->rowCount();


					    if(intval($activity['Votes']) > 9 && $activity['Remaining_Places'] > 0 && $participate == 0){

					    	$html_activities .= '<button onclick="location.href=\'activities.php?participate&id_activity='.$activity['Id_Activity'].'\'" class="add_to_cart">Je participe</button>';

					    }else if($participate == 1){

					    	$html_activities .= '<button onclick="location.href=\'activities.php?remove&id_activity='.$activity['Id_Activity'].'\'" class="add_to_cart">Me désinscrire</button>';

					    }

					    $html_activities .= '</p>

					    
					  </div>
					</div>

				</div>
			</div>
		</div>

		<hr>';

}

$html_activities .= "<br><br><h1>Activitées passées</h1>";

foreach ($past_activities as $past_activity) {

	$html_activities .= '<div class="container">
			<div class="col-md-9 technology-left">
				<div class="page">

					<div class="container" style="display: flex; width: 100%;">
					  <div id="image">
					    <a href="single_activity.php?id='.$past_activity['Id_Activity'].'"><img style="width: 130px; height: 130px; border-radius: 20px;" src="'.$past_activity['Activity_Thumbnail'].'"></a>
					  </div>
					  <div id="text">
					    <h2>'.$past_activity['Activity_Name'].'</h2>
					    <p class="right">Il y avait <strong>'.$past_activity['Number_Of_Participants'].'</strong> participant(s) | Il restait <strong>'.$past_activity['Remaining_Places'].'</strong> place(s) </p>
					    <p>Descriptif de l\'activité : <strong>'.$past_activity['Activity_Description'].'</strong> <br> Lieu : <strong>'.$past_activity['Activity_Place'].'</strong> <br> Date : <strong>'.substr($past_activity['Date_Event'],0,10).'</strong><br>Heure : <strong>'.substr($past_activity['Date_Event'],10,6).'</strong><br>

					    <p class="right">

					    Le prix était de <strong>'.$past_activity['Activity_Price'].'€</strong><br><br><br><br>';

					    $check_participation->execute(array(
					    	':idu' => $_SESSION['id'],
					    	':ida' => $past_activity['Id_Activity']
					    ));
					    $participate = $check_participation->rowCount();


					    if($participate == 1){

					    	$html_activities .= '<button class="add_to_cart">Vous avez participé</button>';

					    }else if($participate == 0){

					    	$html_activities .= '<button class="add_to_cart">Vous n\'avez pas participé</button>';;

					    }

					    $html_activities .= '</p>

					    
					  </div>
					</div>

				</div>
			</div>
		</div>

		<hr>';
	
}

?>