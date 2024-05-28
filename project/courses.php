<?php include('./header.php') ;
include('./conection.php'); 

$query = isset($_GET['query']) ? $_GET['query'] : '';


?>

      <section style="height: 100px;"></section>


      <section style="display: flex;"> 
      <div class="search_containaire_cours" style="width: 25%;  height:480px;  " >
        <div>
            <ul>
              
                <li>

                <?php
                    include('./get_cours.php');
                ?>
        
                <h4>Course Subjects</h4>
                <?php  while ($row = $featurd__cours->fetch_assoc()) { ?>
                   <a class="namea" href="./courses.php?category=<?php echo $row['category']; ?>">
                    <div class="element" style="display: flex;">
                   
                        <div style="width: 150px;"><label for="" ><?php echo $row['category']; ?></label></div>
                        <span class="badge"><?php echo $row['count']; ?></span>
                    </div></a>
                    <?php  }?>

                  <h4>Course Duration</h4>

                  <?php  while ($row = $featurd___cours->fetch_assoc()) { ?>
                    <a  class="namea" href="./courses.php?hrs1=<?php echo $row['hrs1']; ?>&hrs2=<?php echo $row['hrs2']; ?>">
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" ><?php echo $row['hrs1']; ?> - <?php echo $row['hrs2']; ?> Hours</label></div>
                        <span class="badge"><?php echo $row['count']; ?> </span>
                    </div>
                </a>
                    
                    <?php }?>

                    <h4>Cours Level</h4>
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" >Beginner </label></div>
                        <span class="badge">9</span>
                    </div>
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" >intermdeiate </label></div>
                        <span class="badge">5</span>
                    </div>
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" >Advanced </label></div>
                        <span class="badge">8</span>
                    </div>

                    <h4>Cours Language</h4>
                    <a   class="namea" href="./courses.php?name=English">
                        <div class="element" style="display: flex;">
                        <div class="text" style="width: 150px;"><label for="" >English </label></div>
                        <span class="badge">1</span>
                    </div>
                    </a>
                    
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" >German</label></div>
                        <span class="badge">1</span>
                    </div>
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" >Danish</label></div>
                        <span class="badge">1</span>
                    </div>
                    <div class="element" style="display: flex;">
                        
                        <div style="width: 150px;"><label for="" >Bulgarian</label></div>
                        <span class="badge">1</span>
                    </div>
                    
                </li>

            </ul>
        </div>
      </div>

      <div class="get_containaire_cours" style="width: 73%; height:480px;">

        <div style="border: 1px solid #000; margin: 4px;border-radius: 4px;  box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);">
            <div style="display: flex;">
            <i class="fa-solid fa-bars  barss" onclick="toggleSearchContainaire()"style="padding: 8px; color:#48a3d3; position: fixed; left:0%; top:19%;"></i>

                <div style="padding-left: 3px;  ">
                       <h2 >Free Online Courses</h2>
                <div class="social-share-container" style="width: 100%;">
                    <ul>
                        <li><i class="fa-regular fa-envelope"></i></li>
                        <li><i class="fa-brands fa-facebook"></i></li>
                        <li><i class="fa-brands fa-x-twitter"></i></li>
                        <li><i class="fa-brands fa-linkedin"></i></li>
                        <li><i class="fa-brands fa-whatsapp"></i></li>
                    </ul>
                </div>
                <div style=" padding: 1%;">From Art to Zoology, Alison has thousands of free online courses and is adding more all the time. We seek out experts in their field to design learning material that is comprehensive, broken down into manageable chunks and gives you a series of achievable learning outcomes. Our online courses strive to provide interactive and rich studying experiences </div>
                
                </div>
             <div><img src="./images/search.jpg" style="width: 400px;" alt=""></div>
            </div>
        </div>

        <div>



        <h3 style="padding-top: 10px; ">There are  219 free online courses </h3>
            <ul>
                   <div class="slick-list">
                  <div  style="
                  display: flex;        margin-left:70px; margin-top: 20px;
                  flex-wrap: wrap;">
        
        
        <?php
                    include('./get_courses.php');
                    while ($row = $featurd_cours->fetch_assoc()) {
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
                <a href="./insert_heart.php?idUser=<?php if (isset($_GET['idUser'])) { echo $_GET['idUser']; } ?>&heart=<?php echo $row['id']; ?>"><i id="heart-icon" style="margin: 10px; padding-bottom:-5px" class="fa-regular fa-heart"></i></a>   
                  <a style="font-size: 18px;" href="<?php echo './morinfo.php?id=' . $row['id'] ; ?>">More Info</a>
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
        
      </div>


      </section>


<script>

document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('.category-checkbox');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', filterCoursesByCategory);
    });
});

function filterCoursesByCategory() {
    var selectedCategories = [];
    var checkboxes = document.querySelectorAll('.category-checkbox');
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            selectedCategories.push(checkbox.value);
        }
    });

    var xhr = new XMLHttpRequest();
    xhr.open('POST', './get_courses_by_category.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var courses = JSON.parse(xhr.responseText);
            // Mettre à jour la partie de la page avec les nouveaux cours
        }
    };
    xhr.send(JSON.stringify({ categories: selectedCategories }));
}

</script>


<script>
    document.getElementById("searchForm").addEventListener("enter", function(event) {
        event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

        var searchTerm = document.getElementById("searchInput").value; // Obtenir la valeur de l'entrée de recherche

        // Rediriger l'utilisateur vers la page courses.php avec le paramètre search
        window.location.href = "./courses.php?search=" + encodeURIComponent(searchTerm);
    });
</script>







<?php include('./foter.php') ?>
