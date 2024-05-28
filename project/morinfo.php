<?php include('./header.php') ?>

<section>
    <div style="height: 140px;"></div>

    <div style="display: flex;">
        <div style="width: 30%;">


        <?php 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        include('./get_cours.php'); 

        while ($row = $featurd_morinfo->fetch_assoc()) {
            ?>

<?php
            $imageData = base64_encode($row['image']);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;
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
          <i id="heart-icon" style="margin: 10px; padding-bottom:-5px" class="fa-regular fa-heart"></i>
          <a href="" class="l-but">  Start Learning  </a>
        </div>
      </div>
    </div>
  </div>
</li>


        </div>


<div class="main"  >
        <div>
            <div class="heade">
                <ul>
                    <li><a href="./index.php">Home ></a></li>
                    <li><a href="<?php echo './course.php?id=' . $row['id'] . '&category=' .$row['category']; ?>"><?php echo $row['category']; ?> ></a></li>
                    <li><h4><?php echo $row['name']; ?></h4></li>
                </ul>
            </div>
            <div class="heade">
                <h2><h4><?php echo $row['name']; ?></h2>
                <h5><?php echo $row['intro']; ?></h5>
                <p><?php echo $row['discriptive']; ?></p>
            </div>
            <div style="width: 190px;margin:20px;margin-left:35%">
                <a class="l-but" href="">Continue Learning</a>
            </div>
            
            <?php } ?>  

            <div class="l-tabs">
                <div class="l-tabs__nav" style="padding-left: 70px; padding-right:70px;">
                    <div class="l-tabs__title l-tabs__title--active">
                        <span>course Modules</span>
                    </div>
                    <div class="l-tabs__title">
                        <span>EduJam  Certificates </span>
                    </div>
                </div>
                <div class="l-tabs__content">
                    <div class="course_modules">


                       <?php 
                             include('./get_modul.php'); 
                            while ($row = $featurd_modul->fetch_assoc()) {
                        ?>
                        <hr>
                        <div class="course_modules_modul" style="display: flex;">
                            <div class="modul" >
                            <h4><?php  echo $row['name']; ?></h4>
                            <div style="display: flex;">
                            <i style="padding-top: 10px;" class="fa-solid fa-chevron-down"></i>
                            <p><?php  echo $row['description']; ?></p>
                            </div>
                            
                        <div>
                        </div>
                        </div>
                        
                        <div class="modul_but" style="width: 200px; margin-top: 40px; ">
                        <a class="l-but " href="<?php echo './chapiter.php?module_id='.$row['id'] .'&id='.$id ?>">Continue Learning</a>
                        </div> 
                        </div>
                        <?php } ?>
                        

                       



                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    
</section>




<?php include('./foter.php') ?>