<?php 
include('../conection.php')
?>


<?php 


$stmt  = $conn->prepare("SELECT * FROM users ");
$stmt->execute();
$featurd__users = $stmt->get_result();


?>

<?php 


$stmt  = $conn->prepare("SELECT * FROM cours ");
$stmt->execute();
$featurd__category = $stmt->get_result();


?>