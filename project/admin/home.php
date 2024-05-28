<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admine</title>
    <link rel="stylesheet" href="./CSS/admin.css">
</head>
<body>
    




<?php
    include('../conection.php');



    if(isset($_POST['AddCourse'])) {
        $name = $_POST['name'];
        $descriptif = $_POST['descriptif'];
        $category = $_POST['category'];

        if(isset($_FILES['image_data']) && $_FILES['image_data']['error'] === UPLOAD_ERR_OK) {
            $image_data = file_get_contents($_FILES['image_data']['tmp_name']);
            
            $query = "INSERT INTO cours (name, image_data, descriptif, category) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss", $name, $image_data, $descriptif, $category);

            if($stmt->execute()) {
                $course_id = $stmt->insert_id;
                $chapters = $_POST['chapters'];

                foreach($chapters as $chapter) {
                    $chapter_name = $chapter['name'];
                    $modul_id = $course_id;

                    $query = "INSERT INTO chapiters (modul_id, name) VALUES (?, ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("is", $modul_id, $chapter_name);

                    if($stmt->execute()) {
                        $chapter_id = $stmt->insert_id;
                        $contents = $chapter['contents'];

                        foreach($contents as $content) {
                            $type = $content['type'];
                            $content1 = $content['content1'];
                            $content2 = isset($content['content2']) ? $content['content2'] : NULL;

                            $query = "INSERT INTO cours_chapiters (chapter_id, type, content1, content2) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("isss", $chapter_id, $type, $content1, $content2);
                            $stmt->execute();
                        }
                    }
                }

                echo "Course and chapters added successfully!";
            } else {
                echo "Error adding course: " . $conn->error;
            }
        }
    }




    if(isset($_POST['Add'])) {
        $name = $_POST['name'];
        if(isset($_FILES['image_data']) && $_FILES['image_data']['error'] === UPLOAD_ERR_OK) {
            // Le fichier a été correctement téléchargé, donc vous pouvez accéder à ses données
         $image_data = $_FILES['image_data']['tmp_name'];
       
        $descriptif = $_POST['descriptif'];
        $category = $_POST['name']; 
        
        $query = "INSERT INTO cours (name, image_data, descriptif, category) VALUES ('$name', '$image_data', '$descriptif', '$category')";
        
        $result = $conn->query($query);
        
        if($result) {
           
        } else {
            echo "Error adding course: " . $conn->error;
        } }
    }



    if(isset($_POST['Delete1'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM cours WHERE id=$id";
        $result = $conn->query($query);
        if($result) {
        } else {
            echo "Error deleting course: " . $conn->error;
        }
    }

    // Check if the form is submitted
    if(isset($_POST['Update'])) {
     $username = $_POST['username'];
        $prenom = $_POST['prenom'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $query = "UPDATE users SET Username='$username', prenom='$prenom', Email='$email', Password='$password' WHERE Id={$_POST['id']}";
        $result = $conn->query($query); // Utilisation de $conn au lieu de $connection
        
        if($result) {
           
        } else {
            echo "Error updating user data: " . $conn->error; 
        }
    }

    if(isset($_POST['Delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM users WHERE Id=$id";
        $result = $conn->query($query); // Utilisation de $conn au lieu de $connection
        if($result) {
           
        } else {
            echo "Error deleting user: " . $conn->error; // Utilisation de $conn au lieu de $connection
        }
    }
?>


<div class="main">
    <div class="nav">
        <div class="nav__parent_div" onclick="showSection('users')">
            <h5>users</h5>
        </div>
        <div class="nav__parent_div" onclick="showSection('category')">
            <h5>category</h5>
        </div>
        <div class="nav__parent_div" onclick="showSection('course')">
            <h5>course</h5>
        </div>
    </div>
    <div class="element">



        <div  id="users" class="users">

        <form method="post" action="">
        <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                    

                <?php
                    include('./get_admin.php');
                    
                    while ($row = $featurd__users->fetch_assoc()) {
                ?>
                    <tr>
                        <td><input type="text" name="username" value="<?php echo $row['Username']; ?>"></td>
                        <td><input type="text" name="prenom" value="<?php echo $row['prenom']; ?>"></td>
                        <td><input type="text" name="Email" value="<?php echo $row['Email']; ?>"></td>
                        <td><input type="text" name="Password" value="<?php echo $row['Password']; ?>"></td>
                        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                        <td><input type="submit" name="Update" value="Update"></td>
                        <td><input type="submit" name="Delete" value="Delete"></td>
                    </tr>

                    <?php }?>
                   
                  
                </tbody>
            </table>
            </form>
           

             </div>

                        
        <div id="category" class="category" >


<form method="post" action="">
<table>
        <thead>
            <tr>
                <th>Name</th>
                <th>photo</th>
                <th>descriptif</th>
                
                 <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
        <tr>
                        <td><input type="text" name="name"></td>
                        <td><input type="file" name="image_data"></td>
                        <td><input type="text" name="descriptif" ></td>
                        <td><input type="submit" name="Add" value="Add"></td>
                    </tr>

        <?php
            include('./get_admin.php');
            
            while ($row = $featurd__category->fetch_assoc()) {
        ?>
            <tr>
                <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                <td><img style="width: 20px;" src="data:image/jpeg;base64, <?php echo base64_encode($row['image_data']); ?>" alt=""></td>
                <td><input type="text" name="descriptif" value="<?php echo $row['descriptif']; ?>"></td>
                
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <td><input type="submit" name="Delete1" value="Delete"></td>
            </tr>

            <?php }?>

            
           

        </tbody>
    </table>
    </form>
   

</div>

<div class="course"  id="course" ">
    <form action="">
    <table>
        <thead>
            <tr>
                <th>course</th>
                
            </tr>
        </thead>
        
        <tbody>
        <tr>
                        <td><input type="text" name="name"></td>
                        <td><input type="text" name="image"></td>
                        <td><input type="text" name="discriptive" ></td>
                        <td><input type="text" name="hrs1"></td>
                        <td><input type="text" name="hrs2"></td>
         </tr>   
         <tr>

                        <td><input type="text" name="intro"></td>
                        <td><input type="text" name="category"></td>

                        
         </tr>             
                        <tr>
                             <td><input type="submit" name="Add" value="Add"></td>
                        </tr>
                  

        </tbody>
    </table>
    </form>
</div>

<div  id="course" class="course" >
        <div  class="course" >
            <form method="post" enctype="multipart/form-data">
                <table>
                    <thead>
                        <tr><th colspan="2">Add New Course</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Course Name:</td>
                            <td><input type="text" name="name" required></td>
                        </tr>
                        <tr>
                            <td>Course Image:</td>
                            <td><input type="file" name="image_data" required></td>
                        </tr>
                        <tr>
                            <td>Course Descriptif:</td>
                            <td><textarea name="descriptif" required></textarea></td>
                        </tr>
                        <tr>
                            <td>Course Category:</td>
                            <td><input type="text" name="category" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3>Chapters</h3>
                                <div id="chapters">
                                    <div class="chapter">
                                        <label>Chapter Name: <input type="text" name="chapters[0][name]" required></label>
                                        <div class="contents">
                                            <div class="content">
                                                <label>Type:
                                                    <select name="chapters[0][contents][0][type]" required>
                                                        <option value="video">Video</option>
                                                        <option value="text">Text</option>
                                                        <option value="quiz">Quiz</option>
                                                    </select>
                                                </label>
                                                <label>Content1: <input type="text" name="chapters[0][contents][0][content1]" required></label>
                                                <label>Content2: <input type="text" name="chapters[0][contents][0][content2]"></label>
                                            </div>
                                        </div>
                                        <button type="button" onclick="addContent(this)">Add Content</button>
                                    </div>
                                </div>
                                <button type="button" onclick="addChapter()">Add Chapter</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="AddCourse" value="Add Course"></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

</div>
</div>
</div>





<script>

function showSection(sectionId) {
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        if (section.id === sectionId) {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
}

let chapterIndex = 1;
let contentIndex = [1];

function addChapter() {
    const chapterHTML = `
    <div class="chapter">
        <label>Chapter Name: <input type="text" name="chapters[${chapterIndex}][name]" required></label>
        <div class="contents">
            <div class="content">
                <label>Type:
                    <select name="chapters[${chapterIndex}][contents][0][type]" required>
                        <option value="video">Video</option>
                        <option value="text">Text</option>
                        <option value="quiz">Quiz</option>
                    </select>
                </label>
                <label>Content1: <input type="text" name="chapters[${chapterIndex}][contents][0][content1]" required></label>
                <label>Content2: <input type="text" name="chapters[${chapterIndex}][contents][0][content2]"></label>
            </div>
        </div>
        <button type="button" onclick="addContent(this)">Add Content</button>
    </div>`;
    document.getElementById('chapters').insertAdjacentHTML('beforeend', chapterHTML);
    contentIndex.push(1);
    chapterIndex++;
}

function addContent(button) {
    const chapterDiv = button.parentElement;
    const chapterIdx = Array.from(chapterDiv.parentElement.children).indexOf(chapterDiv);
    const contentIdx = contentIndex[chapterIdx]++;
    const contentHTML = `
    <div class="content">
        <label>Type:
            <select name="chapters[${chapterIdx}][contents][${contentIdx}][type]" required>
                <option value="video">Video</option>
                <option value="text">Text</option>
                <option value="quiz">Quiz</option>
            </select>
        </label>
        <label>Content1: <input type="text" name="chapters[${chapterIdx}][contents][${contentIdx}][content1]" required></label>
        <label>Content2: <input type="text" name="chapters[${chapterIdx}][contents][${contentIdx}][content2]"></label>
    </div>`;
    chapterDiv.querySelector('.contents').insertAdjacentHTML('beforeend', contentHTML);
}
</script>

   
</body>
</html>
