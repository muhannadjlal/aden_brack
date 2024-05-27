
<?php

$username="root";
$password="";
$connect= new PDO("mysql:host=localhost;dbname=institutes_version_1;charset=utf8;",$username,$password);



// // استعلام SQL لعرض مستويات العصر
// $sql = "SELECT level_ID, type_level FROM levels";
// // تنفيذ استعلام SQL
// $result = $conn->query($sql);

session_start();

// التحقق من تسجيل الدخول بالفعل
if (!isset($_SESSION["institute_id"])) {
    header("Location: login.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
      
<nav class="menu" style="background: #00abf0;">
            <div id="logo">
                <a href="home.php" style="text-decoration: none; color: white;">الصفحة الرئيسية</a>
            </div>
            <ul>
                <li>
                    <a class="menu-item" href="addcourse.php"> اضافة دورة</a>
                </li>
                <li>
                    <a class="menu-item" href="addlevel.php"> اضافة مستوى</a></li>
                <li>
                    <a class="menu-item" href="logout.php"> تسجيل الخروج</a></li>
            </ul>
        </nav>
        <?php
             if(isset($_GET['edit'])){
$seledittwo =$connect->prepare("SELECT * FROM  courses WHERE course_ID = :id");
$seledittwo->bindParam("id",$_GET['edit']);
$seledittwo->execute();
foreach($seledittwo AS $data){
echo'
        <form action="" method="post">
           
<p>  تعديل الدورة</p>
           
<div class="addcourses">
    <div class="contianer">
        
        <div class="inputs">
           <button type="submit" name="send" value="'. $data['course_ID'] .'"style="height:20px;width:100px;margin-top:18px;background: rgb(3, 255, 3);border:0;">حفظ</button>
        </div>
    </div>
<div class="contianer">
        <div class="text">
            <label for="">سعر الدورة</label>
        </div>
        <div class="inputs">
            <input type="text" name="buys" value="'. $data['price'] .'"style="border-right-width: 2PX;border-left-width: 2PX;height:20px; ">
        </div>
    </div>
   
    
    <div class="contianer">
        <div class="text">
            <label for="">ساعات التدريس</label>
        </div>
        <div class="inputs">
            <input type="text" name="hours" value="'. $data['hours'] .'"style="border-right-width: 2PX;border-left-width: 2PX;height:20px; ">
        </div>
    </div>
    <div class="contianer">
        <div class="text">
            <label for="">اسم الدورة</label>
        </div>
        <div class="inputs">
            <input type="text" name="course_name" value="'. $data['course_name'] .'"style="border-right-width: 2PX;border-left-width: 2PX;height:20px; ">
        </div>
    </div> <div class="contianer">
        <div class="text">
            <label for=""> رقم الدورة</label>
        </div>
        <div class="inputs">
            <input type="text" name="course_ID" value="'. $data['course_ID'] .'" readonly style="border-right-width: 2PX;border-left-width: 2PX;height:20px; ">
        </div>
    </div>
</div>
</form>';
}
}
if(isset($_POST['send'])) {
    $update =$connect->prepare("UPDATE courses SET course_name= :course_name , hours = :hours , price = :price  WHERE course_ID = :id");
    $update->bindParam("course_name",$_POST['course_name']);
    $update->bindParam("hours",$_POST['hours']);
    $update->bindParam("price",$_POST['buys']);
    $update->bindParam("id",$_POST['course_ID']);
    $update->execute();
    header("location: update_course.php?".$_POST['course_ID']);
}

             
?>
</body>
</html>