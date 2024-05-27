<?php
// تأكد من تضمين ملف الاتصال بقاعدة البيانات هنا
include_once 'db_connection.php';

// فحص ما إذا تم إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال البيانات من النموذج
    $institute_name = $_POST['institute_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status="قيد العمل";
    $image_name = $_FILES['institute_image']['name']; // اسم الصورة
    $image_tmp_name = $_FILES['institute_image']['tmp_name']; // مسار الصورة المؤقت

    // انقل الصورة إلى مجلد محدد على الخادم
    $target_dir = "uploads/"; // المجلد الهدف للصور
    $target_file = $target_dir . basename($_FILES["institute_image"]["name"]); // مسار الملف النهائي للصورة
    move_uploaded_file($image_tmp_name, $target_file); // نقل الصورة إلى المجلد المحدد

    // إدراج البيانات في جدول قاعدة البيانات
    $sql = "INSERT INTO institute (institute_name,institute_image, status,username, password ) VALUES ('$institute_name',  '$image_name','$status','$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        header("location:login.php");
    } else {
        echo "حدث خطأ أثناء إضافة المعهد: " . $conn->error;
    }
    
    // إغلاق اتصال قاعدة البيانات
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style2.css">
    <title>إضافة معهد</title>
</head>
<body >
    
    <main class="mainlogin">
   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <div class="page">
        <div class="container">
          <div class="left">
            <div class="login">register</div>
            <!-- <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read<br><small>Design By Dilabar Hussain</small> </div> -->
          </div>
          <div class="right" style="text-align: right;">
          
            <h2>إضافة معهد جديد</h2>
            <div class="conetent">
            <div class="text"><label for="institute_name" style="font-size:20px; margin-bottom:5px;padding-left:5px;">:اسم المعهد</label></div>
                <input type="text" name="institute_name"  style="background:white; width:390px; color:black;"id="institute_name" required><br><br>
            </div>
            <div class="conetent">
            <div class="text"><label for="username" style="font-size:20px; margin-bottom:5px;padding-left:5px;">:اسم المستخدم</label></div>
                <input type="text" name="username" style="background:white;width:390px; color:black;"id="username" required><br><br>
                </div>
                <div class="conetent">
                <div class="text"><label for="password" style="font-size:20px; margin-bottom:5px;padding-left:5px;">:كلمة المرور</label></div>
                <input type="password" name="password" style="background:white;width:390px; color:black;"id="password" required><br><br>
                </div>
                <div class="conetent">
                <label for="image" style="font-size:20px; margin-bottom:5px;padding-left:5px;">:صورة المعهد</label>
                <input type="file" name="institute_image"id="image" required><br><br>
                
                
              <button type="submit" id="submit" value="Submit">انشاء حساب</button>
            </div>
          </div>
        </div>
        
      </div>
    
    </form>
</main>
</body>
</html>
