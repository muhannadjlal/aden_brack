
<?php
include 'db_connection.php';
session_start();

// التحقق من تسجيل الدخول بالفعل
if (!isset($_SESSION["institute_id"])) {
    header("Location: login.php");
    exit();
}
$institute_id=$_SESSION["institute_id"];
$sql = "SELECT level_id, type_level FROM levels,institute WHERE levels.institute_id=$institute_id";

// تنفيذ استعلام SQL
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"><style>
        
h2 {
    margin-top: 40px;
    text-align: center;
}

.table-wrapper {
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2);
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td,
.fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 15px;
}

.fl-table thead th {
    color: #ffffff;
    background: #333;
    font-size: 15px;
}

.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #333;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

tfoot td a {
    text-decoration: none;
    font-size: xx-large;
    font-weight: bold;
    color: black;
}


/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before {
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead,
    .fl-table tbody,
    .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child {
        border-bottom: none;
    }
    .fl-table thead {
        float: right;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td,
    .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 15px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: right;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
    .fl-table tfoot td a {
        font-size: small;
    }
}
    </style>
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
        
        <form action="add_course.php" method="post"><p>اضافة دورة جديدة</p>
            <div class="addcourses" >
                <div class="contianer">
                    
                    <div class="inputs">
                       <button type="submit" name="send" style="height:20px;width:100px;margin-top:18px;background: rgb(3, 255, 3);border:0;">حفظ</button>
                    </div>
                </div>
            <div class="contianer">
                    <div class="text">
                        <label for="">سعر الدورة</label>
                    </div>
                    <div class="inputs">
                        <input type="text" name="buys"style="border-right-width: 2PX;border-left-width: 2PX;height:20px; ">
                    </div>
                </div>
               
                
                <div class="contianer">
                    <div class="text">
                        <label for="">اختر مستوى </label>
                    </div>
                    <div class="inputs">
                    <select name="level_id">
                    
                     <?php
                    // عرض مستويات العصر في قائمة HTML
                    while ($row = $result->fetch_assoc()) {
                            ?>
                    <option value="<?php echo $row['level_id']; ?>"><?php echo $row['type_level']; ?></option>
                    <?php
                     }
                 ?>
                    </select>
                    </div>
                </div>
                <div class="contianer">
                    <div class="text">
                        <label for="">ساعات التدريس</label>
                    </div>
                    <div class="inputs">
                        <input type="text" name="hours" style="border-right-width: 2PX;border-left-width: 2PX;height:20px;">
                    </div>
                </div>
                <div class="contianer">
                    <div class="text">
                        <label for="">اسم الدورة</label>
                    </div>
                    <div class="inputs">
                        <input type="text" name="course_name"style="border-right-width: 2PX;border-left-width: 2PX;height:20px;">
                    </div>
                </div>
            </div>
        </form>
                <!--  محتوى الصفحة  -->
                <div class="table-wrapper">
            <p>الدورات الموجودة</p>
            <table class="fl-table">
                <thead>
                    <tr>    <th style="background: #00abf0;">العمليات</th>
                        <th style="background: #00abf0;">سعر الدورة</th>
                        <th style="background: #00abf0;"> المستوى</th>
                        <th style="background: #00abf0;">ساعات التدريس </th>
                        <th style="background: #00abf0;">اسم الدورة</th>
                        <th style="background: #00abf0;">العدد</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            
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
                echo "<td><a href='update_course.php?edit=" . $row['course_ID'] . "'>تعديل</a> | <a href='deleete_course.php?id=" . $row['course_ID'] . "'>حذف</a></td>";
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