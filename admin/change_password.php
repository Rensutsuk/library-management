<?php
session_start();
require("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/user.css" />
  <title>PUP Library</title>
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Change User Password</h1>
      </div>
      <form action="update_password.php" method="post">
        <div class="form-group">
          <label for="password">Enter Password:</label>
          <input type="password" class="form-control" name="old_password">
        </div>
        <div class="form-group">
          <label for="New Password">Enter New Password:</label>
          <input type="password" name="new_password" class="form-control">
        </div>
        <button type="submit" name="update">Update Password</button>
      </form>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>