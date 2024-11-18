<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tamdb";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استعلام SQL لجلب قيمة النقرات الحالية للمستخدم 'ali'
$result = $conn->query("SELECT clic FROM clicker WHERE user='ali' LIMIT 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $clic_value = $row['clic'] + 1;

    // تحديث قيمة النقرات
    $sql = "UPDATE clicker SET clic=$clic_value WHERE user='ali'";

    if ($conn->query($sql) === TRUE) {
        echo $clic_value; // إرسال القيمة الجديدة كاستجابة
    } else {
        echo "خطأ في تحديث السجل: " . $conn->error;
    }
} else {
    echo "لا توجد بيانات";
}

$conn->close();
?>