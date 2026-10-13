<?php
$conn = new mysqli('localhost', 'root', '', 'alula');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $itemID = $_POST['itemID'];
    $name = $_POST['author_name'];
    $body = $_POST['body'];
    $rating = $_POST['rating'];
    $type = $_POST['type'];

    $sql = "INSERT INTO reviews (itemID, author_name, body, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $itemID, $name, $body, $rating);
    if ($stmt->execute()) {
        header("Location: item.php?id=$itemID&type=$type");
        exit;
    } else {
echo "فشل إرسال التقييم: " . $stmt->error;
    }
}
?>
