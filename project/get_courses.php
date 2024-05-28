<?php

include('./conection.php');

$query = isset($_GET['query']) ? $_GET['query'] : '';

if($query){
  $stmt = $conn->prepare("SELECT * FROM cours_modul WHERE name LIKE ?");
  $searchTerm = "%" . $query . "%";
  $stmt->bind_param("s", $searchTerm);
  $stmt->execute();
  $featurd_cours = $stmt->get_result();
}else{

if (isset($_GET['category'])) {
    $category = $_GET['category'];

$stmt = $conn->prepare("SELECT * FROM cours_modul WHERE category=? ");
  if ($stmt ) {

    $stmt->bind_param("s", $category);
    $stmt->execute();
    $featurd_cours = $stmt->get_result();

} 
} elseif(isset($_GET['hrs1']) && isset($_GET['hrs2'])){
  $hrs1 = $_GET['hrs1'];
  $hrs2 = $_GET['hrs2'];


  $featurd_cours=null;
  $stmt = $conn->prepare("SELECT * FROM cours_modul WHERE (hrs1=? AND hrs2=?)");
  if ($stmt) {
      $stmt->bind_param("ii", $hrs1, $hrs2);
      if ($stmt->execute()) {
          $featurd_cours = $stmt->get_result();
          if (!$featurd_cours) {
          }
      } else {
      }
  } else {
      
  }
}elseif(isset($_GET['name'])){
  $name = '%'.$_GET['name'].'%';

  $stmt = $conn->prepare("SELECT * FROM cours_modul WHERE name Like ? ");
    if ($stmt ) {
  
      $stmt->bind_param("s", $name);
      $stmt->execute();
      $featurd_cours = $stmt->get_result();
  
  } 
}
else{
  $stmt = $conn->prepare("SELECT * FROM cours_modul  ");

  $stmt->execute();
  $featurd_cours = $stmt->get_result();
}



}
?>

