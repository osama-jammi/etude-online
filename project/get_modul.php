

<?php 
include('./conection.php')
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer la requête SQL
    $stmt1  = $conn->prepare("SELECT * from modul where cours_modul_id=?");

    // Vérifier si la préparation a réussi
    if ( $stmt1) {
        // Lier les paramètres

        $stmt1->bind_param("i", $id);

        // Exécuter la requête

        $stmt1->execute();

        // Récupérer les résultats

        $featurd_modul = $stmt1->get_result();
    } else {
        
    }
} else {
  
}
?>


<?php
if (isset($_GET['module_id'])) {
    $moduleId = $_GET['module_id'];

    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT * FROM chapiters WHERE modul_id = ?");
    
    // Vérifier si la préparation a réussi
    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param("i", $moduleId);
        
        // Exécuter la requête
        $stmt->execute();
        
        $featurd_chapiter = $stmt->get_result();
        }
    } else {
       
    }

?>


<?php
if (isset($_GET['chapter_id'])) {
    $chapter_id = $_GET['chapter_id'];

    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT * FROM cours_chapiters WHERE chapter_id = ?");
    
    // Vérifier si la préparation a réussi
    if ($stmt) {
        // Lier les paramètres
        $stmt->bind_param("i", $chapter_id);
        
        // Exécuter la requête
        $stmt->execute();
        
        $featurd_chapiter_cours = $stmt->get_result();
        $chapter_id =$chapter_id ;
        
    } else {
        echo "Erreur de préparation de la requête SQL";
    }
} else {
   
}

?>