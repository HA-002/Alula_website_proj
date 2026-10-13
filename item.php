<?php
$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$item_id = $_GET['id'] ?? null;
$type = $_GET['type'] ?? 'activity'; // default to activity

if ($item_id) {
    if ($type === 'event') {
        $sql = "SELECT * FROM events WHERE ID = ?";
    } else {
        $sql = "SELECT * FROM activities WHERE ID = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        die("Not found.");
    }

    $stmt->close();
} else {
    die("Invalid ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Event Details - AlUla</title>
  <link rel="stylesheet" href="styles.css" />
  <style>
    /* CSS */
    .hero { position: relative; height: 50vh; background-image: url('<?= isset($event['image']) ? htmlspecialchars($event['image']) : 'default.jpg' ?>'); background-size: cover; background-position: center; display: flex; align-items: center; justify-content: center; color: white; text-align: center; }
    .hero h1 { font-size: 3rem; font-weight: bold; }
    .section { max-width: 900px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); }
    .section h2 { margin-bottom: 1rem; font-size: 2rem; }
    .reviews .review { margin-bottom: 1.5rem; border-bottom: 1px solid #ddd; padding-bottom: 1rem; }
    .stars { color: #f4a261; }
    .add-review form { display: flex; flex-direction: column; gap: 1rem; }
    .add-review input, .add-review textarea, .add-review button { padding: 0.75rem; font-size: 1rem; border-radius: 5px; border: 1px solid #ccc; }
    .add-review textarea { resize: vertical; }
    .add-review button { background-color: #f4a261; color: #fff; border: none; cursor: pointer; }
    .add-review button:hover { background-color: #e76f51; }
    .star-rating { display: flex; flex-direction: row-reverse; justify-content: flex-start; }
    .star-rating input { display: none; }
    .star-rating label { font-size: 1.5rem; color: #ccc; cursor: pointer; }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label { color: #f4a261; }
    footer { text-align: center; padding: 1.5rem; background-color: #111; color: #fff; }
  </style>
</head>
<body>
  <header class="header">
    <div class="logo"> AlUla</div>
    <nav class="nav">
      <a href="index.php">Home</a>
      <a href="About.php">About AlUla</a>
      <a href="events.php">Events</a>
      <a href="Activities.php">Activities</a>
      <a href="contact.php">Contact Us</a>
    </nav>
    
  </header>

  <section class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1><?= htmlspecialchars($event['title']) ?></h1>
    </div>
  </section>
  
  <section class="section event-details">
    <h2 class="section-title">About This Experience</h2>
    <p class="event-description">
      <?= nl2br(htmlspecialchars($event['description'])) ?>
    </p>
  </section>

  <section class="section reviews">
    <h2 class="section-title">What People Are Saying</h2>
    <?php
    $stmt = $conn->prepare("SELECT author_name, body, rating FROM reviews WHERE itemID = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($review = $result->fetch_assoc()) {
      echo "<div class='review'>";
      echo "<p><strong>" . htmlspecialchars($review['author_name']) . "</strong></p>";
      echo "<p class='stars'>" . str_repeat("★", $review['rating']) . str_repeat("☆", 5 - $review['rating']) . "</p>";
      echo "<p>" . nl2br(htmlspecialchars($review['body'])) . "</p>";
      echo "</div>";
    }

    $stmt->close();
    ?>
  </section>

  <section class="section add-review">
    <h2 class="section-title">Share Your Experience</h2>
    <form action="submitR.php" method="POST" class="review-form" style="display: flex; flex-direction: column; gap: 1rem; background: #fafafa; padding: 1.5rem; border-radius: 8px; border: 1px solid #ddd;">
  <input type="hidden" name="itemID" value="<?= $item_id ?>">
  <input type="hidden" name="type" value="<?= htmlspecialchars($type) ?>">

  <input type="text" name="author_name" placeholder="Your Name" required style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 5px;">

  <textarea name="body" placeholder="Write your review..." rows="4" required style="padding: 0.75rem; border: 1px solid #ccc; border-radius: 5px; resize: vertical;"></textarea>

  <div style="display: flex; align-items: center; gap: 0.5rem;">
    <label style="font-weight: bold;">Your Rating:</label>
    <div class="star-rating" style="display: flex; flex-direction: row-reverse;">
      <input type="radio" name="rating" value="5" id="star5"><label for="star5">&#9733;</label>
      <input type="radio" name="rating" value="4" id="star4"><label for="star4">&#9733;</label>
      <input type="radio" name="rating" value="3" id="star3"><label for="star3">&#9733;</label>
      <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
      <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
    </div>
  </div>

  <button type="submit" style="background-color: #f4a261; color: #fff; padding: 0.75rem; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Submit Review</button>
</form>

  </section>

  <footer>
    <p>© 2025 AlUla, All Rights Reserved.</p>
  </footer>
</body>
</html>
