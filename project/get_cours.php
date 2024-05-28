<?php 
include("./conection.php");

?>

<?php

$stmt  = $conn->prepare("SELECT cours.id, cours.name, cours.image_data AS image, COUNT(*) AS course_count ,cours.category as category 
FROM cours 
LEFT JOIN element_cours ON cours.id = element_cours.cours_modul 
GROUP BY cours.id Limit 5");
$stmt->execute();

$featurd_cours = $stmt->get_result();

?>

<?php 
include('./conection.php')
?>





<?php

$stmt = $conn->prepare("SELECT cours.id, cours.name ,cours.category as category FROM cours WHERE id >= 6 LIMIT 11");
$stmt->execute();

$featurd_courss = $stmt->get_result();

?>

<?php
if (isset($_GET['category'])) {
    $category= $_GET['category'];

$stmt = $conn->prepare("SELECT cours.id, cours.name , cours.category as category  FROM cours WHERE category =? and id >=2 LIMIT 11");
$stmt->bind_param("s", $category);
$stmt->execute();

$featurd_coursss = $stmt->get_result();
}

?>




<?php

$featurd_element = null;

if (isset($_GET['category']) ) {
    $category= $_GET['category'];

    $stmt  = $conn->prepare(" SELECT 
    cours.name AS name,
    cours.descriptif AS descriptif,
    COUNT(cours_modul.id) AS total_courses,
    SUM(cours_modul.nmbr) AS total_nmbr
FROM 
    cours
LEFT JOIN 
    cours_modul ON cours.category = cours_modul.category
WHERE 
    cours_modul.category = ?    
GROUP BY
    cours.id
LIMIT 1
");
    if ($stmt) {
        $stmt->bind_param("s", $category); 
        $stmt->execute();
        $featurd_element = $stmt->get_result()->fetch_assoc(); 
        $stmt->close();
    }else {
        
    }
}



if (isset($_GET['category']) ) {
    $category= $_GET['category'];

    $stmt  = $conn->prepare(" SELECT * from cours_modul WHERE 
    cours_modul.category = ?    
");
    if ($stmt) {
        $stmt->bind_param("s", $category); 
        $stmt->execute();
        $featurd_cours_category=  $stmt->get_result();
    }else {
        
    }
}

?>


    <?php

$stmt  = $conn->prepare("SELECT * FROM cours_modul ");
$stmt->execute();

$featurd__courses = $stmt->get_result();


    $stmt  = $conn->prepare("SELECT * FROM cours_modul where nmbr>20 ");
    $stmt->execute();

    $featurd_popular_courses = $stmt->get_result();


    $stmt  = $conn->prepare("SELECT * FROM cours_modul WHERE category IN ('Personal-Development', 'Business', 'Management') ");
    $stmt->execute();

    $featurd_top_diplomas = $stmt->get_result();


    $stmt  = $conn->prepare("SELECT * FROM cours_modul where hrs1 >=3  ");
    $stmt->execute();
    $featurd_top_certificatea = $stmt->get_result();



    $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
    $stmt = $conn->prepare("SELECT * FROM cours_modul WHERE date >= ? ");
    $stmt->bind_param('s', $oneMonthAgo);
    $stmt->execute();
    $featured_new_courses = $stmt->get_result();




    $stmt  = $conn->prepare("SELECT category, COUNT(*) AS count FROM cours_modul GROUP BY category;    ");
$stmt->execute();

$featurd__cours = $stmt->get_result();


$stmt  = $conn->prepare("SELECT hrs1, hrs2, COUNT(*) AS count FROM cours_modul GROUP BY hrs1, hrs2");
$stmt->execute();

$featurd___cours = $stmt->get_result();


?>




<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer la requête SQL
    $stmt = $conn->prepare("SELECT * FROM cours_modul WHERE id=? LIMIT 1");


    // Vérifier si la préparation a réussi
    if ($stmt ) {
        // Lier les paramètres
        $stmt->bind_param("i", $id);


        // Exécuter la requête
        $stmt->execute();
       

        // Récupérer les résultats
        $featurd_morinfo = $stmt->get_result();

    } else {
        
    }
} else {
  
}
?>









