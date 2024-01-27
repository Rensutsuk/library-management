<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css" />
  <title>PUP Library - Registration</title>
</head>

<body>
  <div class="login-card">
    <div class="card-head">
      <h1>User Registration</h1>
    </div>
    <form action="includes/register.php" method="post">
      <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea name="address" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

  <a href="index.php" class="admin-login-btn home-btn">Home</a>
  <a href="user_login.php" class="admin-login-btn user-login-btn">User Login</a>
</body>

</html>