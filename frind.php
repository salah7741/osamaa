<?php

include_once('index.php');

$clic = isset($_POST['clickk']) ? $_POST['clickk'] : '';
$use = isset($_POST['clickuser']) ? $_POST['clickuser'] : '';

$click_num = mysqli_query($conn, "SELECT clic, user FROM clicker");


while ($row = mysqli_fetch_array($click_num)) {
   
    $conn = new mysqli("localhost", "root", "", "tamddb");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعلام SQL لجلب قيمة محددة من العمود clic
$result = $conn->query("SELECT clic FROM clicker WHERE user='ali'");
}
// التأكد من وجود بيانات
if ($result->num_rows > 0) {
    // الحصول على أول صف من النتيجة
    $row = $result->fetch_assoc();
    $clic_value = $row['clic'];
}else {
    $clic_value = "لا توجد بيانات";
}

// إغلاق الاتصال
$conn->close();

 

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
       
        <label id="counter" name="clickk" class="btnn" ><?php echo $clic_value; ?></label>
   
    </center>

    <script>
        function increment() {
            var counter = document.getElementById("counter");
            counter.textContent = parseInt(counter.textContent);
        }
    </script>
</body>
</html>