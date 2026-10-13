<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب الأنشطة
$sql = "SELECT * FROM activities WHERE categoryID = 2";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Activity - Discover AlUla</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo"> AlUla</div>
    <nav class="nav">
      <a href="index.php">Home</a>
      <a href="About.php">About AlUla</a>
      <a href="events.php">Events</a>
      <a href="activities.php">Activities</a>
      <a href="contact.php">Contact Us</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
      <p class="subtitle">Explore Adventure and Thrills</p>
      <h1 class="title">Exciting Activities in AlUla</h1>
    </div>
  </section>

  <!-- Activity Cards Section -->
  <section class="activity-section">
    <h2 class="section-title">Featured Activities</h2>
    <div class="cards-grid">
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="card">';
              echo '<a href="item.php?type=activity&id=' . $row['ID'] . '">';
              echo '<!-- Source: experiencealula.com -->';
              echo '<img src="' . $row['image'] . '" alt="' . htmlspecialchars($row['title']) . '" />';
              echo '</a>';
              echo '<div class="details">';
              echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
              echo '<p>' . htmlspecialchars($row['description']) . '</p>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          echo '<p>No activities found.</p>';
      }
      ?>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 AlUla, All Rights Reserved.</p>
  </footer>
</body>
</html>

<?php $conn->close(); ?>