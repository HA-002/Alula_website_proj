<?php
session_start();

// الاتصال بقاعدة البيانات
$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['Username'];
$password = $_POST['Password'];

// التحقق من وجود المستخدم وكلمة المرور كما هي (بدون تشفير)
$stmt = $conn->prepare("SELECT * FROM admin WHERE Username = ? AND Password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}

$stmt->close();
$conn->close();
?>