<?php

include_once('index.php');

$clic = isset($_POST['clickk']) ? $_POST['clickk'] : '';
$use = isset($_POST['clickuser']) ? $_POST['clickuser'] : '';

$click_num = mysqli_query($conn, "SELECT clic, user FROM clicker");

echo "<table border=1 align='center'>";
echo "<tr>";
echo "<td>المستخدم</td>";
echo "<td>العملة</td>";

echo "</tr>";

while ($row = mysqli_fetch_array($click_num)) {
    echo "<tr>";
    echo "<td>" . $row['user'] . "</td>";
    $conn = new mysqli("localhost", "root", "", "tamdb");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعلام SQL لجلب قيمة محددة من العمود clic
$result = $conn->query("SELECT clic FROM clicker WHERE user='ali' LIMIT 1");
}
// التأكد من وجود بيانات
if ($result->num_rows > 0) {
    // الحصول على أول صف من النتيجة
    $row = $result->fetch_assoc();
    $clic_value = $row['clic'] +1;
    
    //00000000000000000000000000000000000000000000000000
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tamdb";

// إجراء الإتصال
$connn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الإتصال
if ($connn->connect_error) {
    die("فشل الإتصال: " . $connn->connect_error);
}

// لتحديث سجل بالجدول SQL بناء جملة 
$sql = "UPDATE clicker SET clic=$clic_value WHERE user='ali'";

// تنفيذ الإستعلام
if ($connn->query($sql) === TRUE) {
    echo "تم تحديث السجل بنجاح";
} else {
    echo "فشل تحديث السجل: " . $connn->error;
}

// إغلاق الإتصال
$connn->close();


//0000000000000000000000000
} else {
    $clic_value = "لا توجد بيانات";
}

// إغلاق الاتصال
$conn->close();

    echo "<td>" .$clic_value . "</td>";
   
    echo "</tr>";


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <style>
        body {
            background-color: #2b393e;
        }
        .btn {
            border: none;
            padding: 150px 150px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 90px;
            cursor: pointer;
            margin: 5px;
            border: gray 10px solid;
            border-radius: 150px;
        }
        .btnn {
            color: rgb(25, 0, 255);
            border: none;
            padding: 25px 100px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 30px;
            cursor: pointer;
            margin: 5px;
            border: rgb(93, 51, 51) 10px solid;
            border-radius: 50px;
            background-color: rgb(107, 140, 170);
        }
        .image-button {
            background-image: url('ICON.jpg'); /* مسار الصورة */
            background-size: cover;
            background-position: center;
            width: 100px;
            height: 100px;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            padding: 150px 150px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
            border: gray 10px solid;
            border-radius: 150px;
        }
    </style>
  
</head>

<body>
    <center>
        <br>
        
        <label id="counter" name="clickk" class="btnn" ><?php echo $clic_value; ?></label>
        <label id="" name="clickuser" class="btnn">iiii</label>
        <br><br>
        <button class="image-button" onclick="increment()"></button>
    </center>

    <script>
        function increment() {
            var counter = document.getElementById("counter");
            counter.textContent = parseInt(counter.textContent);
        }
    </script>
</body>
</html>