
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    
<nav class="menu"style="background: #00abf0;">
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
session_start();
include "db_connection.php"; // اتصال بقاعدة البيانات

// التحقق من وجود معرف المعهد في الجلسة
if(isset($_SESSION['institute_id'])) {
    $institute_id = $_SESSION['institute_id'];

    // الاستعلام للتحقق مما إذا كانت المعلومات متاحة في جدول العناوين
    $query = "SELECT * FROM addresses WHERE institute_id = $institute_id";
    $result = $conn->query($query);

  if($result->num_rows >0){while($rows=$result->fetch_assoc()){?>
  <div style="display:flex;justify-content: space-evenly;text-align: center;algin_item:center;margin-top:50px">
  <label for=""><?php echo $rows['address'];?></label>
    <label for=""><?php echo $rows['phone_number'];?></label>
    <label for=""><?php echo $rows['email'];?></div></label>
  <?php }}
  else{
    echo"<div style='display:flex;justify-content: center;font-size:20px; margin-top:40px;'>

    <a href='add_information.php' style=''> 
    الرجاء   اكمال البيانات الخاصة بـك 
    </a>";
    echo"<br>";
    
    echo"</div>";
}
}
?>

<div class="table-wrapper">
            <p>الدورات الموجودة</p>
            <table class="fl-table">
                <thead >
                    <tr style="background: #00abf0;">  
                          <!-- <th>العمليات</th> -->
                        <th style="background: #00abf0;">سعر الدورة</th>
                        <th style="background: #00abf0;"> المستوى</th>
                        <th style="background: #00abf0;">ساعات التدريس </th>
                        <th style="background: #00abf0;">اسم الدورة</th>
                        <th style="background: #00abf0;">العدد</th>
                    </tr>
                </thead>
                <tbody>

<?php// إغلاق الاتصال
$conn = null;
?>                    <?php
            
$sql = "SELECT    courses.course_name,
courses.price,
levels.type_level,
courses.hours,
courses.course_ID
FROM institute
INNER JOIN courses ON courses.institute_id = institute.institute_id
--   INNER JOIN institute ON course_institute.institute_id = institute.institute_id
INNER JOIN levels ON courses.level_id = levels.level_id
WHERE institute.institute_id=$institute_id";  
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    // echo "<td><a href='update_course.php?edit=" . $row['course_ID'] . "'>تعديل</a> | <a href='deleete_course.php?id=" . $row['course_ID'] . "'>حذف</a></td>";
    echo "<td>" . $row['price'] . "</td>";
    // echo "<td><a href='edit_course.php?id=" . $row['course_ID'] . "'>تعديل</a> | <a href='deleete_course.php?id=" . $row['course_ID'] . "'>حذف</a></td>";
    echo "<td>". $row['type_level'] ."</td>";
    echo "<td>" . $row['hours'] . "</td>";
    // echo"<td><a href='add_course_institute.php?id=". $row['institute_id'] .">اضافة دورات المعهد </a> </td>";
    echo "<td>" . $row['course_name'] . "</td>";
    echo "<td>" . $row['course_ID'] . "</td>";
    echo "</tr>";
}
mysqli_close($conn);?>
            <tbody>
</table>


</body>
</html>