<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
$status = $_GET['status'] ?? '';
$messages = [
  'added' => 'Item added successfully.',
  'edited' => 'Item updated successfully.',
  'deleted' => 'Item deleted successfully.',
  'error' => 'Something went wrong, try again.'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f5f5f5;
    }

    .admin-container {
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .tab {
      padding: 10px 20px;
      margin: 0 5px;
      cursor: pointer;
      background: #ddd;
      border-radius: 5px;
      transition: 0.3s;
    }

    .tab.active {
      background: #333;
      color: #fff;
    }

    .form-section {
      display: none;
    }

    .form-section.active {
      display: block;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 5px;
      font-weight: bold;
    }

    input, textarea, select, button {
      padding: 10px;
      margin-bottom: 15px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #333;
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: #555;
    }

    .alert {
      background-color: #e0ffe0;
      color: #2e7d32;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="admin-container">
  <h1>Admin Dashboard</h1>

  <?php if ($status && isset($messages[$status])): ?>
    <div class="alert"><?php echo $messages[$status]; ?></div>
  <?php endif; ?>

  <div class="tabs">
    <div class="tab active" onclick="showTab('add')">Add Item</div>
    <div class="tab" onclick="showTab('edit')">Edit Item</div>
    <div class="tab" onclick="showTab('delete')">Delete Item</div>
  </div>

  <!-- Add Form -->
  <div id="add" class="form-section active">
    <form action="add_item.php" method="POST" enctype="multipart/form-data">
      <label>Title:</label>
      <input type="text" name="title" required>

      <label>Description:</label>
      <textarea name="description" required></textarea>

      <label>Category:</label>
      <select name="category" id="add-category" required onchange="toggleEventType('add')">
        <option value="">-- Select --</option>
        <option value="activity">Activity</option>
        <option value="events">Events</option>
      </select>

      <div id="add-event-type" style="display:none;">
        <label>Event Type:</label>
        <select name="event_type">
          <option value="">-- Select Event Type --</option>
          <option value="1">Upcoming Events</option>
          <option value="2">Festivals</option>
          <option value="3">Exhibitions</option>
        </select>
      </div>

      <label>Upload Image:</label>
      <input type="file" name="image">

      <label>Or Image URL:</label>
      <input type="url" name="image_url" placeholder="https://example.com/image.jpg">

      <button type="submit">Add</button>
    </form>
  </div>

  <!-- Edit Form -->
  <div id="edit" class="form-section">
    
    <form action="edit.php" method="POST" enctype="multipart/form-data">
      <label>Item ID:</label>
      <input type="number" name="item_id" required>

      <label>Title:</label>
      <input type="text" name="title" required>

      <label>Description:</label>
      <textarea name="description" required></textarea>

      <label>Category:</label>
      <select name="category" id="edit-category" required onchange="toggleEventType('edit')">
        <option value="">-- Select --</option>


<option value="activity">Activity</option>
        <option value="events">Events</option>
      </select>

      <div id="edit-event-type" style="display:none;">
        <label>Event Type:</label>
        <select name="event_type">
          <option value="">-- Select Event Type --</option>
          <option value="1">Upcoming Events</option>
          <option value="2">Festivals</option>
          <option value="3">Exhibitions</option>
        </select>
      </div>

      <label>Change Image (optional):</label>
      <input type="file" name="image">

      <label>Or Image URL:</label>
      <input type="url" name="image_url">

      <button type="submit">Update</button>
    </form>
  </div>

  <!-- Delete Form -->
  <div id="delete" class="form-section">
    <form action="delete.php" method="POST">
      <label>Item ID:</label>
      <input type="number" name="item_id" required>

      <label>Category:</label>
      <select name="category" required>
        <option value="">-- Select --</option>
        <option value="activity">Activity</option>
        <option value="events">Events</option>
      </select>

      <button type="submit">Delete</button>
    </form>
  </div>
</div>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    const alertBox = document.querySelector('.alert');
    if (alertBox) {
      setTimeout(() => {
        alertBox.style.display = 'none';
      }, 3000);
    }
  });
</script>

<script>
  function showTab(tabId) {
    document.querySelectorAll('.form-section').forEach(section => {
      section.classList.remove('active');
    });
    document.querySelectorAll('.tab').forEach(tab => {
      tab.classList.remove('active');
    });
    document.getElementById(tabId).classList.add('active');
    document.querySelectorAll('.tab').forEach(tab => {
      if (tab.getAttribute('onclick') === `showTab('${tabId}')`) {
        tab.classList.add('active');
      }
    });
  }

  function toggleEventType(form) {
    const category = document.getElementById(form + '-category').value;
    const eventTypeDiv = document.getElementById(form + '-event-type');
    eventTypeDiv.style.display = category === 'events' ? 'block' : 'none';
  }
  
</script>

</body>
</html>