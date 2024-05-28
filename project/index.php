
<?php 
session_start();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduJam</title>
    <link rel="icon" href="./images/log.png" />
    <link rel="stylesheet" href="./style.css" />
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
    <section class="header size_back_header" style=" background-image: 
    url(./images/banner.png);    background-position: center;
  background-size: cover;
  position: relative;">
      <nav>
        <a href="index.php"><img src="./images/logo.png" alt="" /></a>
        <form action="courses.php" method="get">
          <div class="search-container">
              <input type="search"  name="query"  placeholder="what do you want to learn ?">
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
        <div style="max-height: calc(-155px + 100vh); display:none; " class="Explore_courses">
         
            <div>
            <hr>
            <div class="nav__flex flex">
              <p>COURSE CATEGORIES</p>
              <p><a href="./courses.php">View All Free Courses</a></p>
              
            </div>


            <div style="max-height: 270px; overflow-y: auto;">
            <?php 
        include('./get_cours.php'); 

        while ($row = $featurd_cours->fetch_assoc()) {
            ?>

<?php
            $imageData = base64_encode($row['image']);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
            ?>


            
              <a href="<?php echo './course.php?category=' .$row['category']; ?>">
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


      <div class="text-box">
        <h1>World's biggest University</h1>
        <p>
        Free Online Courses With Certificates & Diplomas
        </p>
        <a href="./courses.php" class="hero-btn">Visit Us to Know More</a>
      </div>
    </section>

    <!-- course -->

    <section class="course">
      <h1>Courses We Offer</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      <div class="row">

              <?php 
        include('./get_cours.php'); 

        while ($row = $featurd_cours->fetch_assoc()) {
            ?>


<a href="<?php echo './course.php?category=' .$row['category']; ?>">
        <div class="course-col">
          <?php
            $imageData = base64_encode($row['image']);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
            ?>

          <img src="<?php echo $imageSrc; ?>" alt="Course Image" style="
    height: 42px;
">
          <h5><?php echo $row['name']; ?></h5>
          <h6><?php echo $row['course_count']; ?> courses <samp>-></samp></h6>
        </div>
        </a>
        <?php 
}
?>        
      </div>

      <div class="explore" style="transform: translate(400px, -20px);">
      
        <button><a href="./courses.php">Explore More offer</a></button>
      </div>
    </section>

<!-- campus -->
    <!-- <section class="campus">
      <h1>Not sure where to begin? Or even what you want to do?</h1>
      <p>Answer a few short questions and we'll provide you with a Career Ready Plan!</p>
      <div class="row">
        <div class="campus-col">
          <img src="./images/crp-new.png" alt="">
          <br>
          <h3>I want to upskill in my current career</h3>
          <div class="layer">
            <h3>I want to upskill in my current career</h3>
          </div>
        </div>
        <div class="campus-col">
          <img src="./images/crp-upskill.png" alt="">
          <h3>I want to find a new career</h3>
          <div class="layer">
            <h3>I want to find a new career</h3>
          </div>
        </div>
      </div>
    </section> -->
 <!-- Facilities -->


    <?php


include('./get_cours.php');

$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'popular';


?>
    <section class="facilities" style="margin-left: 40px;">

      <br>
      <br><br>

      <div class="tab" style="margin-left: 35px;">
      <a <?php if ($activeTab === 'popular') echo 'class="active"'; ?> href="?tab=popular">Popular Courses</a>
      <a <?php if ($activeTab === 'diplomas') echo 'class="active"'; ?> href="?tab=diplomas">Top Diplomas</a>
      <a <?php if ($activeTab === 'certificates') echo 'class="active"'; ?> href="?tab=certificates">Top Certificates</a>
      <a <?php if ($activeTab === 'courses') echo 'class="active"'; ?> href="?tab=courses">New Courses</a>
        <span class="under" style="opacity: 1; left: 323.271px;"></span>
      </div>
      
      <div id="coursess" style=" border-radius:20px;margin-left:50px; max-width: 1060px;overflow-x:auto;">
      <ul>
      <button type="button" class="slick-prev left" style="transform: translate(-50px, 200px);"><span class="icon-thick-"> < </span></button>
        <button type="button" class="slick-prev rghit" style="transform: translate(1060px, 200px);"><span class="icon-thick-"> > </span></button>
        <div class="slick-list">
          <div  style="
          display: flex;margin-left:20px; margin-top: 20px; ">


<?php
       $featured_courses = null;

       switch ($activeTab) {
           case 'popular':
               $featured_courses = $featurd_popular_courses;
               break;
           case 'diplomas':
               $featured_courses = $featurd_top_diplomas;
               break;
           case 'certificates':
               $featured_courses = $featurd_top_certificatea;
               break;
           case 'courses':
               $featured_courses = $featured_new_courses;
               break;
           default:
               $featured_courses = $featurd_popular_courses; 
               break;
       }
       
       if ($featured_courses) {
           // Afficher les cartes des cours
           while ($row = $featured_courses->fetch_assoc()) {
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
          <a href="<?php echo './morinfo.php?id=' . $row['id'] ; ?>">More Info</a>
          <a href="">  Start Learning  </a>
        </div>
      </div>
    </div>
  </div>
</li>




<?php } } else {
    echo 'Aucun cours trouvé.';
}?>
          </div>
        </div>
      </ul>
     
      </div>
   

      <div class="explore">
        <a style="border: none;" href="./courses.php"><button >ExploreMoreCourses</button></a>
        
      </div>
    </section>

    <!-- testimonials -->

    <section class="careers">
      <h1>Advance Your Career. Learn In-demand Skills.</h1>
      <p>Upskill in business analytics, health care, graphic design, management and more.</p>


<ul>
      <?php 
        include('./get_cours.php'); 

        while ($row = $featurd_courss->fetch_assoc()) {
            ?>

      
        <li><a href="<?php echo './course.php?category=' .$row['category']; ?>"><?php echo $row['name']; ?></a></li>
        <?php }?>
      </ul>
      <h4 style="padding-bottom: 20px;"> <a href="./courses.php" style="color:#48a3d3;">View More Skiles ></a></h4>
    </section>
    


    <script>
  document.addEventListener("DOMContentLoaded", function() {
    const scrollContainer = document.getElementById("coursess");
    const scrollDistance = 1022; // La distance de défilement vers la droite en pixels
    
    const slickPrevButton = document.querySelector(".slick-prev.rghit");
    slickPrevButton.addEventListener("click", function() {
      scrollContainer.scrollTo({
        left: scrollContainer.scrollLeft + scrollDistance,
        behavior: "smooth"
      });
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const scrollContainer = document.getElementById("coursess");
    const scrollDistance = -1022; // La distance de défilement vers la droite en pixels
    
    const slickPrevButton = document.querySelector(".slick-prev.left");
    slickPrevButton.addEventListener("click", function() {
      scrollContainer.scrollTo({
        left: scrollContainer.scrollLeft + scrollDistance,
        behavior: "smooth"
      });
    });
  });
</script>

<?php include('./foter.php') ?>