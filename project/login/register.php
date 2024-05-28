<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $prenom = $_POST['prenom'];
            $password = $_POST['password'];

            $image = $_FILES['image']['tmp_name']; 
            $imageData = file_get_contents($image);
         

            $query = "INSERT INTO users (Username, Email, Password, image, prenom) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            
            // Vérifiez si la préparation de la requête a réussi
            if ($stmt) {
                // Lier les paramètres avec les variables
                mysqli_stmt_bind_param($stmt, "ssbss", $username, $email, $password, $imageData, $prenom);
                // Exécuter la requête
                mysqli_stmt_execute($stmt);
            
                // Vérifier si la requête a été exécutée avec succès
                if(mysqli_stmt_affected_rows($stmt) > 0) {
                    echo "<div class='message'><p>Registration successful!</p></div>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
                } else {
                    echo "<div class='message'><p>Error occurred while registering!</p></div>";
                }
            
                // Fermer l'instruction
                mysqli_stmt_close($stmt);}
        }
        else {
         
        ?>

            <header>Sign Up</header>
            <form action="" method="post"  enctype="multipart/form-data">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="username">prenom</label>
                    <input type="text" name="prenom" id="prenom" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
               
                <div class="field input">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" required accept="image/*">
                </div>
                   

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        
        <?php } ?>
      </div>
</body>
</html>