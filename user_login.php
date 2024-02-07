<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css" />
  <title>PUP Library - Login</title>
</head>

<body>
  <div class="login-card">
    <div class="card-head">
      <h1>User Login</h1>
    </div>
    <form action="" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" name="login">Login</button> |
      <a href="signup.php">No account? Signup now.</a>
    </form>
    <?php
    session_start();
    
    if (isset($_POST['login'])) {
      $connection = mysqli_connect("localhost", "admin", "password");

      if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
      }

      $db = mysqli_select_db($connection, "lms");

      if (!$db) {
        die("Database selection failed: " . mysqli_error($connection));
      }

      $email = mysqli_real_escape_string($connection, $_POST['email']);

      $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
      $stmt = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        if ($row['password'] == $_POST['password']) {
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['id'] = $row['id'];
          header("Location: user/user_dashboard.php");
          exit(); // Ensure that the script stops execution after redirect
        } else {
          ?>
          <script>alert("Invalid email or password.");</script>
          <?php
        }
      }

      mysqli_stmt_close($stmt);
      mysqli_close($connection);
    }
    ?>
  </div>

  <a href="index.php" class="admin-login-btn home-btn">Home</a>
  <a href="admin_login.php" class="admin-login-btn user-login-btn">Admin Login</a>
</body>

</html>