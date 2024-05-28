<?php



// Connexion à la base de données
include('./conection.php');



// Vérifie si les paramètres 'iduser' et 'heart' sont définis dans l'URL
if (isset($_GET['idUser']) && isset($_GET['heart'])) {

    // Récupère les valeurs des paramètres 'iduser' et 'heart' depuis l'URL
    $courseId = $_GET['heart'];
    $idUser = $_GET['idUser'];
    
    // Prépare la requête SQL
    $sql = "INSERT INTO heart (heart, id_user) VALUES (?, ?)";

    // Prépare la déclaration
    $stmt = $conn->prepare($sql);

    // Lie les paramètres
    $stmt->bind_param("ii", $courseId, $idUser);
    try {
        // Exécute la requête
        $stmt->execute();
        include("./courses.php"); // Redirige l'utilisateur vers la page courses.php si l'insertion est réussie
        exit;
    } catch (mysqli_sql_exception $e) {
        // Vérifie si l'erreur est due à une violation de contrainte UNIQUE
        if ($e->getCode() == 1062) {
            include("./courses.php"); // Redirige l'utilisateur vers la page courses.php si une entrée en double est détectée
            exit;
        } else {
            // Affiche l'erreur si elle n'est pas due à une entrée en double
            echo "Error: " . $e->getMessage();
        }
    }

    // Ferme la déclaration
    $stmt->close();
}

// Ferme la connexion à la base de données
$conn->close();

?>