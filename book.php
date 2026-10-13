<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $destination = htmlspecialchars($_POST["destination"]);
    $date = htmlspecialchars($_POST["date"]);
    $guests = (int)$_POST["guests"];


    echo "<h2>Thank you, $name!</h2>";
    echo "<p>Your trip to <strong>$destination</strong> on <strong>$date</strong> for <strong>$guests</strong> guests has been booked.</p>";
    echo "<a href='book.php'>← Back to Booking</a>";
} else {
    header("Location: book.php");
    exit;
}
?>
