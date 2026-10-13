<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_id'] ?? '';
    $category = $_POST['category'] ?? '';

    if (empty($item_id) || empty($category)) {
        header("Location: admin.php?status=error");
        exit;
    }

    if ($category === 'events') {
        $sql = "DELETE FROM events WHERE id = ?";
    } elseif ($category === 'activity') {
        $sql = "DELETE FROM activities WHERE id = ?";
    } else {
        header("Location: admin.php?status=error");
        exit;
    }

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location: admin.php?status=error");
        exit;
    }

    $stmt->bind_param("i", $item_id);

    if ($stmt->execute()) {
        header("Location: admin.php?status=deleted");
        exit;
    } else {
        die("خطأ في الحذف: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>