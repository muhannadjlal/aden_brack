<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <title>Document</title>
    
    
    <style>
.mainlogin{
    display:flex;
justify-content:center;
width: 97%;
align-items:center;
border:20px solid #00abf0;
height:500px;
border-radius:20px ;
}
form{
    display:flex;
    justify-content:;}
    .form{
        /* border:10px solid silver; */
        margin-top:20px;
        padding:30px;
        font-weight: 500;
    
    }label{        
        font-size:30px;
        /* padding:20px; */
    }.text{padding:10px}
    input{width: 172px;
    height:30px;
    border-radius:4px ;}
    .page{
        /* border:10px solid silver; */
         text-align:center;}
    .login{font-size:40px;
        font-weight: 600;}
    select{
        margin-top:10px;
        margin-bottom: 10px;        
        height:30px;
    }
    </style>
</head>

<body>

<main class="mainlogin">
    <div class="page">
        <div class="container">
          <div class="left">
            <div class="login">Login </div>
            <!-- <div class="eula">تسجيل الدخول للمدير المعهد<br><small>اي مشكلة تواصل معنا عبر <br></small><small>الرقم التالي 775119141</small> </div> -->
          </div>
          <div class="right">
        

        <form action="login.php" method="post">
        <div class="form">
              <div class="text"><label for="email">USERNAME</label></div>
              <div><input type="text" name="username"></div>
              <div class="text"><label for="password">PASSWORD</label></div>
              <div><input type="password" name="password"></div> 
               <select name="type_user" id=""style="width:172px;">
                        <option value="institute">موظف المعهد</option>
                        <option value="admin">مسوؤال الموقع</option>
                    </select><br>
                    <input type="submit" name="submit" id="submit" value="تسجيل الدخول">
            </div>
        </form>
   
    </div>
          </div>
        </div>
        
      </div>
   
    </main>
</body>
<div>
</html><?php
include "db_connection.php";
session_start();
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $type_user=$_POST['type_user'];
    if($type_user=="institute"){
    $sql="SELECT * FROM institute WHERE username='$username' AND password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows >0){
        $rows=$result->fetch_assoc();
        $_SESSION['institute_id']=$rows['institute_id'];
        header("location:home.php");
        // echo"good";
    }
}  if($type_user=="admin"){
    $sql="SELECT *FROM users WHERE username='$username' AND pssword='$password'";
    $result=$conn->query($sql);
    if($result->num_rows >0){
        $rows=$result->fetch_assoc();
        $_SESSION['user_id']=$rows['user_id'];
        header("location:home_admin.php");
        // echo"good";
    }
}
}

?>