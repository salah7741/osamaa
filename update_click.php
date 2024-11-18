<?php
header('Content-Type: application/json');

// بيانات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tamdb";

// إجراء الإتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الإتصال
if ($conn->connect_error) {
    die(json_encode(['error' => "فشل الاتصال: " . $conn->connect_error]));
}

// اسم المستخدم المحدد
$user = 'ali'; // يمكنك تعديل اسم المستخدم هنا

// جلب قيمة العداد الحالية من قاعدة البيانات
$result = $conn->query("SELECT clic FROM clicker WHERE user='$user' LIMIT 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $clic_value = $row['clic'] + 1;

    // تحديث قيمة العداد في قاعدة البيانات
    $sql = "UPDATE clicker SET clic=$clic_value WHERE user='$user'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['clic_value' => $clic_value]);
    } else {
        echo json_encode(['error' => "فشل تحديث السجل: " . $conn->error]);
    }
} else {
    echo json_encode(['error' => "لا توجد بيانات للمستخدم المحدد"]);
}

// إغلاق الاتصال
$conn->close();
?>