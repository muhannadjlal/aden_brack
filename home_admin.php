<!DOCTYPE html>
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
                <a href="home_admin.php" style="text-decoration: none; color: white;">الصفحة الرئيسية</a>
            </div>
            <ul>
                <li>
                    <a class="menu-item" href="logout.php"> تسجيل الخروج</a></li>
            </ul>
        </nav>
        <div class="table-wrapper">
            <p>طلبات المعاهد</p>
            <table class="fl-table">
                <thead>
                    <tr>
                        <th style="background: #00abf0;">ارسال</th>
                        <th style="background: #00abf0;">الحالة</th>    
                        <th style="background: #00abf0;">البريد الالكتروني</th>
                        <th style="background: #00abf0;">عنوان المعهد</th>
                        <th style="background: #00abf0;"> رقم الهاتف</th>
                        <!-- <th style="background: #00abf0;">صورة المعهد</th> -->
                        <th style="background: #00abf0;">اسم المعهد</th>
                        <th style="background: #00abf0;">العدد</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "db_connection.php";
                $sql="SELECT institute.institute_id,institute.institute_name,institute.institute_image ,institute.status,addresses.address,addresses.email,addresses.phone_number FROM institute
                INNER JOIN addresses ON institute.institute_id=addresses.institute_id";
                
         $result = mysqli_query($conn, $sql);
         if ($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
        echo"<tr>";
        
        echo"<form action'home_admin.php' method='POST'>";
        echo"<td><button type='submit'>ارسال</button></td>";
        echo "<td>";
        echo"<input type='hidden' name='institute_id' value='".$row['institute_id']."'>";
           echo" <select name=' status'>";
            echo"<option>".$row['status']."</option>";
              echo"<option value='قبول'style='background:red;'> قبول</option>";  
               echo" <option value='رفض' style='background:blue;'>رفض</option>";
            echo"</select></td>";
            echo"</form>";
            echo"<td>". $row['email']."</td>";
            echo"<td>".$row['address']."</td>";
          echo "<td>" . $row['address']."</td>";
            // echo"<td><img  src=\"uploads/" . $row['institute_image'] . "\" alt=\"صورة المعهد\" style='width:80px;'></td>";
            echo"<td>" .$row['institute_name']."</td>";
            echo "<td>". $row['institute_id']."</td>";
       echo"</tr>"; 
        
        }}
        // else {
           
        //     header("Location:". $_SERVER['HTTP_REFERER']);
        //      echo "<script>showNoInfoPopup();</script>";
        //   }
          
        
        ?>
        <?php
if(isset($_POST['status']) && isset($_POST['institute_id'])) {
    $new_status = $_POST['status'];
    $transfer_id = $_POST['institute_id'];

    

    // استعلام SQL لتحديث الحالة في جدول التحويلات
    $update_sql = "UPDATE institute SET status = ? WHERE institute_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $new_status, $transfer_id);

    // تنفيذ الاستعلام المحدث
    if ($stmt->execute()) {
        echo "تم تحديث الحالة بنجاح.";
    } else {
        echo "حدث خطأ أثناء تحديث الحالة.";
    }

    // إغلاق الاستعلام والاتصال بقاعدة البيانات
    $stmt->close();
    
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
</body>
</html>