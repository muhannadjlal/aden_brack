<?php

include 'db_connection.php';
$institute_id=$_GET['id'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <script src="script.js"></script>
    <title>معلومات المعهد</title>
    
</head>

<body style="background:white;">

<header class="header" style="background: #00abf0;"">
<a href="index.php" class="logo">دليل المعاهد</a>
        <nav class="navbar">
            <a href="index.php" >تعريف موقعنا</a>
            <a href="#services">مميزات موقعنا </a>
            <a href="shadeulinstitute.php"class="">المعاهد المناسب لك</a>
            <a href="#">تواصل معنا</a>
        </nav>
    </header>
    <div>
        <div >
            <?php
            $sql = "SELECT * FROM institute WHERE institute_id = $institute_id";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0){
               $row = $result->fetch_assoc();
            
            
            ?>
             <div  style='padding-top: 150px; padding-left: 50px;
            padding-right: 100px; display: flex; background:white; justify-content: right;'>
            <?php echo "<h2 style='padding-top: 100px;color:black;'>".$row['institute_name']."</h2>"?>
            <?php echo "<img src=\"uploads/" . $row['institute_image'] . "\" alt=\"صورة المعهد\" style='margin-left:30px;margin-right:30px; width: 300px;height: 200px;border-radius: 8px;'>";?> 
            </div>
            <?php }?>
        <?php
          include 'db_connection.php';
          $institute_id=$_GET['id'];
          $sql = "SELECT
          addresses.address,
          addresses.email,
          addresses.phone_number,
          addresses.code_map
        FROM institute
        INNER JOIN addresses ON institute.institute_id = addresses.institute_id
        WHERE institute.institute_id = $institute_id;
        "; 
         $result = mysqli_query($conn, $sql);
         if ($result->num_rows > 0){
            $row = $result->fetch_assoc();?>
            
            <div  class="title"style='display: flex; justify-content: space-between; width: 1000px; margin-top: 50px; 
            margin-right: 100px;margin-bottom: 100px;margin-left:300px;background:white;'>
            <div style="color:black;">
            <h3>عنوان المعهد:</h3>
          <a href="<?php echo $row['code_map'];?>"> <?php echo $row['address'];?></a>
            </div>
            
            <div style="color:black;">
            <h3>البيريد الالكتروني:</h3>
            <?php echo $row['email'];?>
            </div>
            <div style="color:black;">
            <h3>رقم المعهد</h3>
            <?php echo $row['phone_number'];?>
            </div>
            </div>
            
         
        <?php
        }else {
           
            header("Location:". $_SERVER['HTTP_REFERER']);
             echo "<script>showNoInfoPopup();</script>";
          }
          
        
         ?>
       
               

            
               
               
       </div>
        </div>
        
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th style="background: #00abf0;">اسم الدورة</th>
                    <th style="background: #00abf0;"> ساعات التدريس</th>
                    <th style="background: #00abf0;">مستوى الدورة</th>
                    <th style="background: #00abf0;">السعر</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            $sql = "SELECT
            institute.institute_name,
            courses.course_name,
            courses.price,
            levels.type_level,
            courses.hours
          FROM institute
          INNER JOIN courses ON institute.institute_id = courses.institute_id
        --   INNER JOIN courses ON course_institute.course_id = courses.course_id
        --   INNER JOIN institute ON course_institute.institute_id = institute.institute_id
          INNER JOIN levels ON courses.level_id = levels.level_id
          WHERE institute.institute_id=$institute_id"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr style='color:black;'>";
                echo "<td> ". $row['course_name'] . "</td>";
                echo "<td>" . $row['hours'] . "</td>";  
                echo "<td>". $row['type_level'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
}

?>

            </tbody>
           
        </table>
  
</body>

</html>