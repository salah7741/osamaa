<?php

include_once('index.php');

$clic = isset($_POST['clickk']) ? $_POST['clickk'] : '';
$use = isset($_POST['clickuser']) ? $_POST['clickuser'] : '';

$click_num = mysqli_query($conn, "SELECT clic, user FROM clicker");





while ($row = mysqli_fetch_array($click_num)) {
    echo "<tr>";
    echo "<td>" . $row['user'] . "</td>";
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
    $clic_value = $row['clic'] +1;
    //00000000000000000000000000000000000000000000000000
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tamddb";

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
    header("location:main1.html")

?>
