<?php include('./header.php') ?>


   <section class="course">


   <?php 
        include('./get_cours.php'); 

        if ($featurd_element) {
            ?>
      <div class="browse_into">
        <div class="brows_intro_bg">
          <div style="
    margin-top: 30px;">
            <ul>
              <li><a href="./courses.php" title="All Courses">All courses  ></a> </li>
              <li><span> <?php echo $featurd_element['name']; ?></span></li>
            </ul>
          </div>
          <div class="intro intro__stats">
            <div>
              <h1> Free Online  <?php echo  $featurd_element['name']; ?>  </h1>
              <p class="bf_intro_headline">
                <span class="bf_intro_text">
                <?php echo $featurd_element['descriptif']; ?>        
                      </span>
              </p>
            </div>
            <div>
              <div class="stats">
                <ul>
                  <li><i class="fa-solid fa-book"></i><strong><?php echo $featurd_element['total_courses']; ?> </strong> Free courses</li>
                  
                  <li><i class="fa-solid fa-user-group"></i><strong><?php echo $featurd_element['total_nmbr'] +5020; ?> </strong>Learners</li>
                  <br>
                  <li><i class="fa-solid fa-graduation-cap"></i><strong><?php echo $featurd_element['total_courses']+90; ?> </strong> Certificates & Diplomas Earned</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
}
?>  
    </div>
  </section>

<section class="related ">
  <h2> Explore Top <span>Subjects</span></h2>
  <ul class="related__topics ">
    <div class="related__row ">
    <?php 
        include('./get_cours.php'); 

        while ($row = $featurd_coursss->fetch_assoc()) {
            ?>

    <li class="slick_slide"><a href="<?php echo "./course.php?category=" .$row['category'];  ?>"><?php echo $row['name']; ?></a></li>
    <?php }?>
  </div>



    <button>Explore More ></button>
  </ul>
</section>

<section class="facilities related">
  <h2>Most Popular <span>IT Courses</span></h2>

  <ul>
    <div class="slick-list">
      <div  style="
      display: flex;        margin-left:70px; margin-top: 20px;">


<?php 
        include('./get_cours.php'); 

        while ($row = $featurd_cours_category->fetch_assoc()) {
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




<?php } ?>


      </div>
    </div>
  </ul>

</section>

<div class="course__benefits">
  <div class="course-section__inner">
    <h3>Benefits Of An Alison Certificate </h3>
    <div class="space-between ">
      <div class="course-list course-list--image">
        <ul>
          <li><span><img src="./images/certify-icon.png" alt=""></span>
          <span><h5>Certify Your Skills</h5> A CPD accredited EduJam Certificate certifies the skills you’ve learned </span></li>
          <li><span><img src="./images/stand-out.png" alt=""></span>
          <span><h5>Stand Out From The Crowd</h5> Add your EduJam Certification to your resumé and stay ahead of the competition </span></li>
          <li><span><img src="./images/advance-in-career.png" alt=""></span>
          <span><h5>Advance in Your Career</h5> Share your EduJam Certification with potential employers to show off your skills and capabilities </span></li>
        </ul>
      </div>
      <div class="course-diploma">
        <img src="./images/certificaation.jpeg" alt="">
      </div>
    </div>
  </div>
</div>

<?php include('./foter.php') ?>