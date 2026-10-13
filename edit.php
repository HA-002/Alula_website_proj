<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['item_id'] ?? '';
    $category = $_POST['category'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $event_type = $_POST['event_type'] ?? null;
    $image_url = '';

    // التحقق من المعطيات
    if (empty($id)  empty($category)  empty($title) || empty($description)) {
        header("Location: admin.php?status=error");
        exit;
    }

    // التعامل مع الصورة
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = "uploads/";
        $imageName = basename($_FILES["image"]["name"]);
        $targetFile = $uploadDir . $imageName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        $image_url = $targetFile;
    } elseif (!empty($_POST['image_url'])) {
        $image_url = $_POST['image_url'];
    }

    // جملة SQL حسب الفئة
    if ($category === 'events') {
        $sql = "UPDATE events SET name = ?, description = ?, image = ?, event_type = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $description, $image_url, $event_type, $id);
    } elseif ($category === 'activity') {
        $sql = "UPDATE activities SET title = ?, description = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $description, $image_url, $id);
    } else {
        header("Location: admin.php?status=error");
        exit;
    }

    if ($stmt->execute()) {
        header("Location: admin.php?status=updated");
        exit;
    } else {
        die("خطأ في التعديل: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>