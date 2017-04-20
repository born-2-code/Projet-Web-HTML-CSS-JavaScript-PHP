<?

// =====================    SINGLE PHOTO CONTROLLER     ========================= //

include 'singleton.php';

if(isset($_GET['remove']) && isset($_GET['id'])){

	//DELETE COMMENTS BECAUSE OF CONSTRAINT

	$del_comments = $conn->prepare("DELETE FROM `Comment` WHERE `Id_Photo` = :id");
	$del_comments->execute(array(':id' => $_GET['id']));


	//DELETE PICTURE

	$del_picture = $conn->prepare("DELETE FROM `Photo` WHERE `Id_Photo` = :id");
	$del_picture->execute(array(':id' => $_GET['id']));

	echo "<script>window.close();</script>";

}


if(isset($_GET['id'])){

	$is_user_admin = $conn->prepare("SELECT User_Status FROM Users WHERE Id_User = :id");
	$is_user_admin->execute(array(':id' => $_SESSION['id']));

	$is_admin = $is_user_admin->fetch();

	$admin_buttons="";

	if($is_admin['User_Status'] == 'Equipe CESI'){
		$admin_buttons="<button onclick='location.href=\"single_photo.php?remove&id=".$_GET['id']."\"' class='add_to_cart'>Remove picture</button><br><br>";
	}

	// get the informations about the photo

	$get_photo = $conn->prepare("SELECT * FROM `Photo` WHERE `Id_Photo` = :id");

	$get_photo->execute(array(
		':id' => htmlspecialchars($_GET['id'])
	));

	$photo = $get_photo->fetch();
	
	$get_comments = $conn->prepare("SELECT `Content`, `Id_User` FROM `Comment` WHERE `Id_Photo` = :id");
	$get_comments->execute(array(
			':id' => htmlspecialchars($_GET['id'])
	));

	$comments = $get_comments->fetchAll();
	$html_comments = '';

	$get_profile_pic = $conn->prepare("SELECT `Avatar` FROM `Users` WHERE `Id_User` = :id");

	foreach ($comments as $comment) {

		$get_profile_pic->execute(array(':id' => $comment['Id_User']));
		$profile_pic = $get_profile_pic->fetch();
		

		$html_comments .= '
				<div class="media response-info">
						<div class="media-left response-text-left">
							<a href="#">
								<img src="'.$profile_pic['Avatar'].'" width="80px" height="80px" class="img-responsive" alt="">
							</a>
						</div>
						<div class="media-body response-text-right">
							<p>'.$comment['Content'].'</p>
							<ul>
								<li>Hier</li>
							</ul>

						</div>
						<div class="clearfix"> </div>
					</div>';
	}

}else if(isset($_GET['insert_comment']) && isset($_GET['content']) && isset($_GET['idp'])){ // insert a new comment

	$insert_comment = $conn->prepare("INSERT INTO `Comment`(`Content`, `Id_User`, `Id_Photo`) VALUES (:content,:idu,:idp)");

	$insert_comment->execute(array(
		':content' => htmlspecialchars($_GET['content']),
		':idu' => $_SESSION['id'],
		':idp' => htmlspecialchars($_GET['idp'])
	));
	header("Location: single_photo.php?id=".$_GET['idp']);

}

?>