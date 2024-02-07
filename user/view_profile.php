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
        <h1>User Profile Detail</h1>
      </div>
      <form>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" value="<?php echo $email; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input type="text" value="<?php echo $mobile; ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="email">Address:</label>
          <input type="text" value="<?php echo $address; ?>" class="form-control" disabled>
        </div>
      </form>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>