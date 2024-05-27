<?php
include "db_connection.php";
if (isset($_GET['id'])){
    $cycle_id=$_GET['id'];
    // استعلام SQL لحذف السجلات التي لها معرف الدورة المحدد
    $sql = "DELETE FROM courses WHERE course_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cycle_id);
    
    // تنفيذ الاستعلام
    if ($stmt->execute()) {
        echo "Records deleted successfully";
    } else {
        echo "Error deleting records: " . $stmt->error;
    }
    header("location:addcourse.php");
    // إغلاق الاتصال
    $stmt->close();
    $conn->close();}





?>