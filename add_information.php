
<?php
include 'db_connection.php';
session_start();

// التحقق من تسجيل الدخول بالفعل
if (!isset($_SESSION["institute_id"])) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
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
        </nav><form action="add_information.php" method="post">
   
   <p style="display: flex;justify-content: center;margin-top: 90px;height: 90px;font-size: 30px;font-weight: bold;">اضافة المعلومات المتعلقه بالمعهد</p>
 <div class="addcourses">
 <div class="contianer">
         <div class="inputs">
         <button name="addinformation"type='submit'style="height:30px;width:100px;margin-top:18px;background: rgb(3, 255, 3);border:0;"> حفظ </button>
         </div></div>
                
     <div class="contianer">
         <div class="text">
             <label for="">عنوان المعهد </label>
         </div>
         <div class="inputs">
         <input type="text" name='address'>
         </div>
         </div>   
         <div class="contianer">
         <div class="text">
             <label for=""> البريد الالكتورني </label>
         </div>
         <div class="inputs">
         <input type="text" name='email'>
         </div>
         </div>
         <div class="contianer">
         <div class="text">
             <label for="">  رقم الهاتف </label>
         </div>
         <div class="inputs">
         <input type="text" name='phonenumber'>
         </div>
         </div>
         <div class="contianer">
         <div class="text">
             <label for=""> ادخل موقعك  </label>
         </div>
         <div class="inputs">
         <input type="text" name='code_map'>
         </div>
         </div>
         
     </div>
  
 </div>
 </form>
</body>
</html>
<?php
include 'db_connection.php';




if (isset($_POST['addinformation']))
{
    // استلام معلومات عنوان المعهد من نموذج HTML
    $name=$_SESSION["institute_id"];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
    $code_map=$_POST['code_map'];
    
    // استعلام SQL لحفظ معلومات عنوان المعهد
    $sql = "INSERT INTO addresses ( address, email, phone_number,code_map,institute_ID) VALUES ( '$address', '$email', '$phone','$code_map',$name)";
    // تنفيذ استعلام SQL
    $conn->query($sql);
    echo" تم الحفظ بنجاح";
    // إعادة توجيه المستخدم إلى صفحة أخرى
    header('Location:home.php');
    

    

}
?>