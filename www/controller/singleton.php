<?


session_start();

// =================== DATABASE CONNECTOR ======================== //


try {
    $conn = new PDO('mysql:host=localhost;dbname=web_project', "root", "root");
}catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// =============================================================== //


?>