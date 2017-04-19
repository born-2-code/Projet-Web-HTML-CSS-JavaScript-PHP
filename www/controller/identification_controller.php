<?

// =====================    IDENTIFICATION CONTROLLER     ========================= //

include 'singleton.php';

if(isset($_SESSION['id'])){
	header('Location: profile.html');
}

// =====================    SIGN IN     ========================= //

if(isset($_POST['email']) && isset($_POST['pwd'])){

	$email = htmlspecialchars($_POST['email']);
	$pwd = htmlspecialchars($_POST['pwd']);

	$check_user = $conn->prepare('SELECT Id_User FROM Users WHERE User_Password = :pwd AND Email = :email');
	
	$check_user->execute(array(
		':pwd' => $pwd, 
		':email' => $email
	));

	if($result = $check_user->fetch()){

		$_SESSION['id'] = $result['Id_User'];
		header('Location: profile.html');
	}
}

// password_hash("password", PASSWORD_DEFAULT).=> Hash

// =====================    SIGN UP     ========================= //

if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email2']) && isset($_POST['password'] && isset($_POST['password_confirmation'])){

	$name = htmlspecialchars($_POST['name']);
	$surname = htmlspecialchars($_POST['surname']);
	$email = htmlspecialchars($_POST['email2']);
	$password = htmlspecialchars($_POST['password']);
	$pwd = htmlspecialchars($_POST['password']);

	$add_user = $conn->prepare('INSERT into Users (User_name, Surname, Email, User_password) VALUES ('$name','$surname', '$email2', '$password')');
	
	$add_user->execute(array(
		':pwd' => $pwd, 
		':email' => $email
	));

	if($result = $check_user->fetch()){

		$_SESSION['id'] = $result['Id_User'];
		header('Location: profile.html');
	}
}

?>