<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style1.css">
<!-- <link rel="stylesheet" href="style.css">         -->
    <title>المعاهد</title>
</head>
<body style="background:black;">
    
<header class="header"style="background: #00abf0;">
        <a href="index.php" class="logo">دليل المعاهد</a>
        <nav class="navbar">
            <a href="index.php" >تعريف موقعنا</a>
            <a href="#services">مميزات موقعنا </a>
            <a href="shadeulinstitute.php">المعاهد المناسب لك</a>
            <a href="#">تواصل معنا</a>
        </nav>
    </header>
<section class="cards" id="projects" >

        <div class="content">
            <?php
            include 'db_connection.php';
             $sql = "SELECT * FROM institute WHERE status='قبول'";  
             $result = mysqli_query($conn, $sql);
             while($row = mysqli_fetch_assoc($result)){
                echo" <div class='project-card'><a href='information_institute.php?id=". $row['institute_id'] ."'  class='more-details'>";
                echo" <div class='project-image'>";
                echo "<img  src=\"uploads/" . $row['institute_image'] . "\" alt=\"صورة المعهد\">";
                echo"</div";
                echo"<div class='project-info'>";
                    echo"<strong class='project-title'>";
                    echo" <span style='color:black'>".$row['institute_name']."</span>";
                    
                    echo"</strong>";
                echo"</div>"; 
                echo"</a>";
                echo"</div>";
             }?>
            
        </div>
</section>
</body>
</html>