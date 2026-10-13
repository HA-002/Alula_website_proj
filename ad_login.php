<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['Username'] ?? '';
$password = $_POST['Password'] ?? '';

// Look the admin up by username only, then verify the password against the stored hash
$stmt = $conn->prepare("SELECT Password FROM admin WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

if ($admin && password_verify($password, $admin['Password'])) {
    session_regenerate_id(true);
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