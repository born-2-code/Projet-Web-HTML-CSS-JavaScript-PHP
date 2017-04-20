<?

// =====================    SINGLE ACTIVITY CONTROLLER     ========================= //

include 'singleton.php';

if(isset($_GET['id'])){

	// GET THE INFORMATIONS ABOUT THE ACTIVITY

	$get_activity_info = $conn->prepare("SELECT * FROM `Activity` WHERE `Id_Activity` = :id");

	$get_activity_info->execute(array(
		':id' => htmlspecialchars($_GET['id'])
	));

	$activity = $get_activity_info->fetch();
	
	$activity_name = $activity['Activity_Name'];
	$activity_description = $activity['Activity_Description'];
	$activity_thumbnail = $activity['Activity_Thumbnail'];
	$activity_date = $activity['Date_Event'];

	// GET PICTURES OF THE ACTIVITY

	$get_activity_pics = $conn->prepare("SELECT * FROM `Photo` WHERE `Id_Activity` = :id");

	$get_activity_pics->execute(array(
		':id' => htmlspecialchars($_GET['id'])
	));

	$photos = $get_activity_pics->fetchAll();
	$html_gallery = "";

	foreach ($photos as $photo) {

		$html_gallery .= '<div class="responsive">
					  		<div class="gallery">
					  		<a href="single_photo.php?id='.$photo['Id_Photo'].'" target="_blank">
					      		<img src="'.$photo['URL'].'" alt="" width="300" height="200">
					      	</a>
					  		</div>
						 </div>';
		
	}
	$html_gallery .= '<div class="clearfix"> </div>';


}else if(isset($_POST['id'])){

	$photo_path = 'images/activity/'.$_SESSION['id'].time().$_FILES['photo']['name'];

	move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);

	$upload_url = $conn->prepare("INSERT INTO `Photo`(`URL`, `Likes`, `Id_Activity`, `Id_User`) VALUES (:url, :likes, :ida, :idu)");

	$upload_url->execute(array(
		':url' => $photo_path,
		':likes' => 0,
		':ida' => $_POST['id'],
		':idu' => $_SESSION['id']
	));

	header('Location: single_activity.php?id='.$_POST['id']);

}else{
	
}

?>