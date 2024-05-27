
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
        </nav><form action="add_level.php" method="post">
        <p style="display: flex;justify-content: center;margin-top: 90px;height: 90px;font-size: 30px;font-weight: bold;">اضافة مستوى </p>
            <div class="addcourses">
                <div class="addcourses">
                <div class="contianer">
                    
                    <div class="inputs">
                       <button type="submit" name="send"style="height:20px;width:100px;margin-top:18px;background: rgb(3, 255, 3);border:0;">حفظ</button>
                    </div>
                </div>
                <div class="contianer">
                    <div class="text">
                        <label for="">المستوى</label>
                    </div>
                    <div class="inputs">
                        <input type="text" name="typelevel" style="border-right-width: 2PX;border-left-width: 2PX;height:20px; ">
                    </div>
                </div>
            </div>
        </form>
</body>
</html>
