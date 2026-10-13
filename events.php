<?php

$conn = new mysqli('localhost', 'root', '', 'alula');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT events.*, category.name AS category_name 
        FROM events 
        INNER JOIN category ON events.categoryID = category.ID";
$result = $conn->query($sql);

$events = [
  'Upcoming Events' => [],
  'Festivals' => [],
  'Exhibitions' => []
];
while ($row = $result->fetch_assoc()) {
  $type = $row['event_type'];
  if (isset($events[$type])) {
    $events[$type][] = $row;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Events - AlUla</title>
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
      <p class="subtitle">Experience Culture, Music, and Adventure</p>
      <h1 class="title">Events in AlUla<br>Festivals, Shows, and More</h1>
    </div>
  </section>

  <!-- Events Tabs -->
  <section class="events-section">
    <div class="container">
      <div class="tabs-container">
        <button class="tab-button active" data-tab="Upcoming Events">Upcoming Events</button>
        <button class="tab-button" data-tab="Festivals">Festivals</button>
        <button class="tab-button" data-tab="Exhibitions">Exhibitions</button>
      </div>

      <?php foreach ($events as $type => $items): ?>
      <div class="events-tab" data-tab="<?= $type ?>" style="<?= $type !== 'Upcoming Events' ? 'display: none;' : '' ?>">
        <?php if (empty($items)): ?>
          <p style="padding: 1rem;">No events available for this category.</p>
        <?php else: ?>
          <div class="cards-grid">
            <?php foreach ($items as $event): ?>
            <div class="card">
              <a href="item.php?type=event&id=<?= $event['ID'] ?>">
                <img src="<?= $event['image'] ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="event-image" />
              </a>
              <div class="details">
                <h3><?= htmlspecialchars($event['title']) ?></h3>
                <p><?= htmlspecialchars($event['description']) ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 AlUla, All Rights Reserved.</p>
  </footer>

  <!-- JS Tab Script -->
  <script>
    const buttons = document.querySelectorAll('.tab-button');
    const tabs = document.querySelectorAll('.events-tab');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const selected = btn.dataset.tab;
        tabs.forEach(tab => {
          tab.style.display = (tab.dataset.tab === selected) ? 'block' : 'none';
        });
      });
    });
  </script>
</body>
</html>

<?php $conn->close(); ?>