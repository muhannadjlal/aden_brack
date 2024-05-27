<?php

include 'db_connection.php';
session_start();

// التحقق من تسجيل الدخول بالفعل
if (!isset($_SESSION["institute_id"])) {
    header("Location: login.php");
    exit();
}
// استدعاء قاعدة البيانات
if (isset($_POST['send']))
// استلام معرف مستوى العصر من نموذج HTML
$course_name=$_POST['typelevel'];
$instituteid=$_SESSION["institute_id"];
// استعلام SQL لتخزين معرف مستوى العصر
$sql = "INSERT INTO levels (institute_id,type_level) VALUES ('$instituteid','$course_name')";

// تنفيذ استعلام SQL
$conn->query($sql);

// إعادة توجيه المستخدم إلى صفحة أخرى
header('Location: addlevel.php');

?>
