<?

// =====================    IDENTIFICATION CONTROLLER     ========================= //

include 'singleton.php';

if(isset($_SESSION['id'])){
	header('Location: profile.php');
}

// =====================    SIGN IN     ========================= //

if(isset($_POST['email']) && isset($_POST['pwd'])){

	$email = htmlspecialchars($_POST['email']);
	$pwd = htmlspecialchars($_POST['pwd']);

	$check_user = $conn->prepare('SELECT Id_User FROM Users WHERE User_Password = :pwd AND Email = :email');
	
	$check_user->execute(array(
		':pwd' => md5($pwd), 
		':email' => $email
	));

	if($result = $check_user->fetch()){

		$_SESSION['id'] = $result['Id_User'];
		header('Location: profile.php');
	}
}

// =====================    SIGN UP     ========================= //

if(isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['emails']) && isset($_GET['password'])){

	$name = htmlspecialchars($_GET['name']);
	$surname = htmlspecialchars($_GET['surname']);
	$email = htmlspecialchars($_GET['emails']);
	$password = htmlspecialchars($_GET['password']);
	$password_confirmation = htmlspecialchars($_GET['password_confirmation']);

	if($password == $password_confirmation){
		// Add a user to the databases

		$add_user = $conn->prepare('INSERT INTO Users (User_name, Surname, Email, User_password, Studies) VALUES ( ?, ?, ?, ?, ?)');

		$add_user->bindParam(1, $name);
		$add_user->bindParam(2, $surname);
		$add_user->bindParam(3, $email);
		$add_user->bindParam(4, md5($password));
		$add_user->bindParam(5, $_GET['r']);
		
		$add_user->execute();

		$get_id_user = $conn->prepare('SELECT Id_User FROM Users WHERE Email = :email');
	
		$get_id_user->execute(array(
			':email' => $email
		));

		$rs_id = $get_id_user->fetch();

		$_SESSION['id'] = $rs_id['Id_User'];

		header('Location: profile.php');
	}
	else{
		header('Location: index.php?error');
	}
}
?>