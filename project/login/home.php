<?php 
session_start();

// Inclure le fichier de configuration pour établir la connexion à la base de données
include('php/config.php');

function getUserDataById($userId, $con) {
    $query = "SELECT * FROM users WHERE Id = $userId";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $prenom = $_POST['prenom'];
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); // Convertir l'image en binaire

  // Requête SQL pour la mise à jour des données de l'utilisateur
  $query = "UPDATE users 
            SET Username = '$username', 
                Email = '$email', 
                Password = '$password', 
                prenom = '$prenom', 
                image = '$image' 
            WHERE Id = " . $_SESSION['id'];

  $result = mysqli_query($con, $query);

  if ($result) {
      // Rediriger l'utilisateur après la mise à jour
      include("./index.php"); 
      exit;
  } else {
      echo "Error: " . mysqli_error($con);
  }
}

// Vérifier si l'utilisateur est connecté via un cookie et que la session n'est pas déjà active
if (isset($_COOKIE['user_id']) && !isset($_SESSION['valid'])) {
    $userId = $_COOKIE['user_id'];
    $userData = getUserDataById($userId, $con); // Utiliser la connexion $con

    if ($userData) {
        // Charger les informations de l'utilisateur dans la session
        $_SESSION['valid'] = $userData['Email'];
        $_SESSION['username'] = $userData['Username'];
        $_SESSION['id'] = $userData['Id'];



        header("Location: home.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="../style.css" />
    <title>EduJam</title>
    <link rel="icon" href="./images/log.png" />
   
    
    <style>

.form-box form .input input {
width: 90%;
}
      .flex{
    display: flex;
}
.container{
  min-height: 0vh;
}
    </style>
</head>
<body>
 
    <nav style="display:flex; ">
        <a href="../index.php"><img src="../images/logo.png" alt="" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa-solid fa fa-xmark" onclick="hideMenu()"></i>
          <ul>
          </ul>
        </div>


      
        <i class="fa-solid fa fa-bars" onclick="showMenu()"></i>
      </nav>

<section style="height: 140px;"></section>

<section>
  <div style="display: flex;">
    <div class="data_person" style="
    width: 20%;  margin-left: 20px;
">


  <div class="flex" >
    
        
        <span style="padding-top: 20px;   padding-left:40px;"><h4><?php echo $_SESSION['username'];  ?> </h4></span>
      </div>
      <p><?php echo $_SESSION['valid']; ?></b></p>
    <hr>
      <div class="elemnents" >
      <div style="max-height: 300px; overflow-y: auto;">      
        <a href="#" id="dsashoardlink">
            <div class="nav__parent_div flex"> 
              <span class="nav__parent_imag" ><img class="nav__parent-img" src="../images/dashboard.png" alt=""></span>
            <span>
              <h5 style="color: black;">Your Dashoard</h5>
          </span>
      </div>
      </a>
      <a href=" <?php echo '../courses.php?idUser=' .   $_SESSION['id']; ?>">
        <div class="nav__parent_div flex"> 
              <span class="nav__parent_imag" ><img class="nav__parent-img" src="../images/lang.png" alt=""></span>
            <span>
              <h5 style="color: black;">Explore Courses</h5>
          </span>
      </div>
      </a>
      <a href="">
        <div class="nav__parent_div flex"> 
              <span class="nav__parent_imag" ><img class="nav__parent-img" src="../images/lang.png" alt=""></span>
            <span>
              <h5 style="color: black;">Changer Language</h5>
          </span>
      </div>
      </a>
      <a href="../gopremium.php">
        <div class="nav__parent_div flex"> 
              <span class="nav__parent_imag" ><img class="nav__parent-img" src="../images/your-certificates.png" alt=""></span>
            <span>
              <h5 style="color: black;">Claim Your Certificate</h5>
          </span>
      </div>
      </a>
      <a href="" id="accountSettingsLink">
      <div class="nav__parent_div flex"> 
              <span class="nav__parent_imag" ><img class="nav__parent-img" src="../images/settings.png" alt=""></span>
            <span>
              <h5 style="color: black;">Account Settings</h5>
          </span>
      </div>
      </a>
      <a href="">
      <div class="nav__parent_div flex"> 
              <span class="nav__parent_imag" ><img class="nav__parent-img" src="../images/help.png" alt=""></span>
            <span>
              <h5 style="color: black;">Help</h5>
          </span>
      </div>
      </a>
      <a href="">
      
              <a href="php/logout.php" style="margin-left: 30%;"> <button class="btn">Log Out</button> </a>
  
      </a>    
     </div>
    </div>
 
    </div>
    <div class="elemntde_border" style="width: 70%; max-height:440px;  overflow-y: auto;border:2px solid #b4b1b1; border-radius: 15px;margin-left: 20px;">
          <div style="padding-left: 20px; max-height:440px;">


<div class="element_de_cours" >



<ul>
                   <div class="slick-list">
                  <div  style="
                  display: flex;        margin-left:70px; margin-top:0;
                  flex-wrap: wrap;">
        
        
        <?php
                    include('./get_heart.php');
                    
                    while ($row = $featurd__courses->fetch_assoc()) {
                ?>
        
        
        <li class="slick-slide">
          <div class="card card--grey  card--long " style="
            height: 400px;
        " >
            <div class="card__img">
            <?php
                    $imageDataa = base64_encode($row['image']);
                    $imageSrcc = 'data:image/jpeg;base64,' . $imageDataa;
                    ?>
              <img src="<?php echo $imageSrcc; ?>" width="254px" height="170px" alt="">
            </div>
            <div class="card__info">
              <div class="card__top"
              style="
            height: 90px;
        ">
                <span><?php echo $row['category']; ?></span>
                <h3><?php echo $row['name']; ?></h3>
              </div>
              <div class="card__bottom">
                <div class="card_duration">
                  <span>"<?php echo $row['hrs1']; ?> - <?php echo $row['hrs2']; ?> hrs"</span>
                  <span>"<?php echo $row['nmbr']; ?> learners"</span>
                </div>
                <div style="
                display: flex;">
                <a href="./home.php?id=<?php echo $_SESSION['id']; ?>&id=<?php echo $row['id']; ?>"><i class="fa-solid fa-heart-crack"></i></a>
                  <a style="font-size: 14px;" href="<?php echo '../morinfo.php?id=' . $row['id'] ; ?>">More Info</a>
                  
                </div>
              </div>
            </div>
          </div>
        </li>
        


        
        <?php
        }?>
                  </div>
                </div>
              </ul>
</div>


           



        <div class="container" style="display: none; margin-left:140px;">
        <div class="box form-box">

        <form action="" method="post"  enctype="multipart/form-data">
                <div class="field input">
                    <label for="username">first name</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="username">last name</label>
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
                
            </form>
            </div>
        </div>

    
<div>

</div>




      </div>
  </div>
  </div>
  
</section>



<div style="display: flex;">
  <div></div>
  <div></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const accountSettingsLink = document.querySelector('#accountSettingsLink');
    const element_de_cours = document.querySelector('.element_de_cours');
    const elemntde_border =document.querySelector('.elemntde_border');
    const container = document.querySelector('.container');

    if (accountSettingsLink && element_de_cours && container) {
        accountSettingsLink.addEventListener('click', function (event) {
            event.preventDefault();

            if (container.style.display === 'none') {
                element_de_cours.style.display = 'none';
                container.style.display = 'block';
                elemntde_border.style.border='1px solid #fff';
            } 
        });
    }
});


dsashoardlink

document.addEventListener('DOMContentLoaded', function () {
    const accountSettingsLink = document.querySelector('#dsashoardlink');
    const element_de_cours = document.querySelector('.element_de_cours');
    const elemntde_border =document.querySelector('.elemntde_border');
    const container = document.querySelector('.container');

    if (accountSettingsLink && element_de_cours && container) {
        accountSettingsLink.addEventListener('click', function (event) {
            event.preventDefault();

            if (container.style.display === 'none') {
               
            } else {
                container.style.display = 'none';
                element_de_cours.style.display = 'block';
                elemntde_border.style.border='2px solid #b4b1b1';
            }
        });
    }
});

</script>



      
</body>
</html>