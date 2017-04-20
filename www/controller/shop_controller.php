<?
// =====================    SHOP CONTROLLER     ========================= //

include_once 'singleton.php';

	$get_all_goodies = $conn->prepare("SELECT * FROM Goodie");
	$get_all_goodies->execute();


	$is_user_admin = $conn->prepare("SELECT User_Status FROM Users WHERE Id_User = :id");
	$is_user_admin->execute(array(':id' => $_SESSION['id']));
	$is_admin = $is_user_admin->fetch();

	if($is_admin['User_Status'] == 'Equipe CESI'){
		$admin = '1';
	}else{
		$admin = '0';
	}

?>