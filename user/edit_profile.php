<?php
session_start();

$connection = mysqli_connect("localhost", "admin", "password");
if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}

$db_selected = mysqli_select_db($connection, "lms");
if (!$db_selected) {
  die("Database selection failed: " . mysqli_error($connection));
}

$name = "";
$email = "";
$mobile = "";
$address = "";

$query = "SELECT name, email, mobile, address FROM users WHERE email = ?";
$stmt = mysqli_prepare($connection, $query);

if ($stmt) {
  mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);

  if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $name, $email, $mobile, $address);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_free_result($stmt);
  } else {
    die("Query execution failed: " . mysqli_stmt_error($stmt));
  }
  mysqli_stmt_close($stmt);
} else {
  die("Query preparation failed: " . mysqli_error($connection));
}
mysqli_close($connection);
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
  <?php include('user_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Edit Profile Detail</h1>
      </div>
      <form action="update.php" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input type="text" name="mobile" class="form-control" value="<?php echo htmlspecialchars($mobile); ?>">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea rows="3" cols="40" name="address"
            class="form-control"><?php echo htmlspecialchars($address); ?></textarea>
        </div>
        <button type="submit" name="update">Update</button>
      </form>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>