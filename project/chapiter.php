<?php include('./header.php') ?>

<section>
    <div style="height: 140px;"></div>

    <div id="chapiter" style="display:flex;">
        <div class="chapiter">

        <?php 
        

        
              include('./get_modul.php'); 
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
                 while ($row = $featurd_chapiter->fetch_assoc()) {
                    $lastChaptId = $row['id'];
                        ?>
            <a href="">
         <div class="chapiter_element" style="height:55px;" >
        
            <a href="./chapiter.php?module_id=<?php echo $moduleId ?>&chapter_id=<?php echo $row['id'] ?>.&id=<?php echo ($id)?>"style="display: flex; "><h4 style="width: 250px;" class="text_chapiter"><?php  echo $row['name']; ?> </h4>
        <div><i style="margin-left: 40px;" class="fa-solid fa-chevron-right  text_chapiter"></i></div></a>

            
            
        </div>
            </a>
        <?php } ?>
        <div class="chapiter_element_rout">
            <a href="./morinfo.php?id=<?php echo ($id)?>"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        </div>
        <div class="cours_elment chapiter">
                    <div style="height: 96%; ">
                    <?php 
                    if (isset($_GET['chapter_id'])) {
                        $chapter_id = $_GET['chapter_id'];
                    
                    
                   
            include('./get_modul.php'); 
            while ($row = $featurd_chapiter_cours->fetch_assoc()) { 
                $lastChapterId = $row['id'];
        ?>
        <div style="display: block;">
            <?php if (!empty($row['content1'])): ?>
        <div>
            <h4 style="    font-size: 14px; padding:5px"><?php echo $row['content1']; ?> </h4></div>
        <?php endif; ?>
        </div>
        <?php if (!empty($row['content2'])): ?>
        <video controls style="width: 86%; margin-left:48px;     margin-top: 13px; border-radius:20px; background-color: #000;">
            <source src="<?php echo 'data:video/mp4;base64,' . base64_encode($row['content2']); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <?php endif; } 
    }?>



                </div>
                    <div style="display: flex; justify-content: space-between;" >
                        <div><a href="./chapiter.php?module_id=<?php echo $moduleId ?>&chapter_id=<?php echo ($chapter_id-1)?>&id=<?php echo ($id)?>" ><i class="fa-solid fa-arrow-left"></i></a></div>
                        <div><a href="./chapiter.php?module_id=<?php echo $moduleId ?>&chapter_id=<?php echo ($chapter_id+1)?>.&id=<?php echo ($id)?>"><i class="fa-solid fa-arrow-right"></i></a></div>
                    </div>
        </div>
    </div>
    
</section>

<?php include('./foter.php') ?>