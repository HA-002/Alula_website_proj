<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - AlUla</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #6a6a6a;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .login-box {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #000;
    }

    .login-box label {
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 5px;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background-color: #333;
      color: white;
      border: none;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    .login-box button:hover {
      background-color: #555;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2>Admin Login</h2>
    <?php
      if (isset($_GET['error'])) {
        echo '<div class="error-message">Invalid username or password.</div>';
      }
    ?>
    <form action="ad_login.php" method="POST">
      <label for="Username">Username:</label>
      <input type="text" name="Username" id="Username" required>

      <label for="Password">Password:</label>
      <input type="Password" name="Password" id="Password" required>

      <button type="submit">Login</button>
    </form>
  </div>

</body>
</html>
