<?php

// استدعاء قاعدة البيانات
include 'db_connection.php';

session_start();

// التحقق من تسجيل الدخول بالفعل
if (!isset($_SESSION["institute_id"])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['send']))
// استلام معرف مستوى العصر من نموذج HTML
$course_name=$_POST['course_name'];
$institute_id=$_SESSION["institute_id"];
$hours=$_POST['hours'];
$level_id = $_POST['level_id'];
$buys=$_POST['buys'];
// استعلام SQL لتخزين معرف مستوى العصر
$sql = "INSERT INTO courses (institute_id,course_name, hours, level_ID, price) VALUES ('$institute_id','$course_name', $hours, $level_id, '$buys')";

// تنفيذ استعلام SQL
$conn->query($sql);

// إعادة توجيه المستخدم إلى صفحة أخرى
header('Location: addcourse.php');

?>
