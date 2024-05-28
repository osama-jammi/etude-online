<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduJam</title>
    <link rel="icon" href="./images/log.png" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./Estilos.css">
<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
 
  </head> 
    
    <body >
    <section class="header">
      <nav>
        <a href="index.php"><img src="./images/logo.png" alt="" /></a>
        <form action="courses.php" method="get">
          <div class="search-container">
              <input type="search"  name="query"  placeholder="what do you want to learn ?" value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
          </div>
          </form>

        <div class="nav-links" id="navLinks">
          <i class="fa-solid fa fa-xmark" onclick="hideMenu()"></i>
          <ul>
            <li class="Explore_Courses1" style="cursor: pointer;" ><a class="Explore"> Explore Courses</a>
            <i style="color: black;" class="fa-solid fa-chevron-down"></i></li>
            <li><a href="./shop.html">Claim Your Certificates</a></li>
            <li><a href="./login/index.php"  id="userBtn"><i  class="fa-solid fa-user user"></i></a> </li>
          </ul>
        </div>
        <div style="max-height: calc(-155px + 100vh); display:none;  box-shadow: 0 0 9999px rgba(160, 159, 158, 0.5); " class="Explore_courses">
          <p>GOALS</p>
          <div class="nav__cats ">
            <div class="nav__parent nav__parent_div flex">
              <img style="width: 20px;" src="./images/ribbon.png" alt="">
              <a href="">Earn a Certificate</a>
            </div>
            <div class="nav__parent nav__parent_div">
            <img style="width: 20px;" src="./images/hat-dark.png" alt="">
               <a href="">Earn a Diploma</a>
            </div>
            </div>
            <div>
            <hr>
            <div class="nav__flex flex">
              <p>COURSE CATEGORIES</p>
              <p><a href="./courses.php">View All Free Courses</a></p>
              
            </div>


            <div style="max-height: 170px; overflow-y: auto;">
            <?php 
        include('./get_cours.php'); 

        while ($row = $featurd_cours->fetch_assoc()) {
            ?>

<?php
            $imageData = base64_encode($row['image']);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
            ?>


            
              <a href="<?php echo './course.php?id=' . $row['id'] . '&category=' .$row['category']; ?>">
                  <div class="nav__parent_div flex"> 
                    <span class="nav__parent_imag" ><img class="nav__parent-img" src="<?php echo $imageSrc; ?>" alt=""></span>
                  <span>
                    <h5 style="color: black;"><?php echo $row['name']; ?></h5>
                    <span style="color:#5b5959; font-size: 12px;">(<?php echo $row['course_count']; ?>)Courses</span>
                </span>
            </div>
            </a>
                 
            <?php 
}
?> 
            
           </div>
          </div>
        </div>

      
        <i class="fa-solid fa fa-bars" onclick="showMenu()"></i>
      </nav>

