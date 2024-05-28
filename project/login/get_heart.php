<?php 
include("./conection.php")
?>



<?php
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT cours_modul.* FROM cours_modul INNER JOIN heart ON heart.heart = cours_modul.id WHERE heart.id_user = ? ");

    if ($stmt ) {
        // Lier les paramètres
        $stmt->bind_param("i", $id);


        // Exécuter la requête
        $stmt->execute();

    $featurd__courses = $stmt->get_result();
       


    } else {
        
    }
} else {
  
}


include("./conection.php");



$host = 'localhost';
$dbname = 'project';
$username = 'root';
$password = '';
try {
    // Establishing a PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Setting PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop script execution
}


if (isset($_SESSION['id']) && isset($_GET['id'])) {
    $idUserr = $_SESSION['id'];
    $idcours = $_GET['id'];



    $sql = "DELETE FROM heart WHERE id_user = ? AND heart = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idUserr, $idcours]);

    // Check if the deletion was successful
    if($stmt->rowCount() > 0) {
        
    } else {
       
    }
} else {
   
    
}




?>
