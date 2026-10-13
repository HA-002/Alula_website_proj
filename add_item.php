<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
$host = "localhost";
$user = "root";
$pass = "";
$db = "alula";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch category ID based on selected category
$categoryID = $_POST['category'] == 'events' ? 1 : 2; // 1 for Events, 2 for Activity

$title = $_POST['title'];
$description = $_POST['description'];
$event_type = $_POST['event_type'] ?? null; // Only if category is events
$image_url = "";

// Handle file upload
if (!empty($_FILES['image']['name'])) {
    $uploadDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFile = $uploadDir . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    $image_url = $targetFile;
} elseif (!empty($_POST['image_url'])) {
    $image_url = $_POST['image_url'];
}

if ($_POST['category'] === 'events') {
    $stmt = $conn->prepare("INSERT INTO events (title, description, image, event_type, categoryID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $title, $description, $image_url, $event_type, $categoryID);
}
elseif ($_POST['category'] === 'activity') {
    $stmt = $conn->prepare("INSERT INTO activities (title, description, image, categoryID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $title, $description, $image_url, $categoryID);
} else {
    die("Invalid category selected.");
}

if ($stmt->execute()) {
    header("Location: admin.php?status=added");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
