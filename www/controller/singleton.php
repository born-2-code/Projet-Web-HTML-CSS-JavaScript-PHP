<?


session_start();

// =================== DATABASE CONNECTOR ======================== //


try {
    $conn = new PDO('mysql:host=localhost;charset=utf8;dbname=Web_Project', "root", "root");
}catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// =============================================================== //


?>