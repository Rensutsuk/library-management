<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$mobile = "";
$address = "";
$query = "select * from users where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
  $name = $row['name'];
  $email = $row['email'];
  $mobile = $row['mobile'];
  $address = $row['address'];
}
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
          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea rows="3" cols="40" name="address" class="form-control"><?php echo $address; ?></textarea>
        </div>
        <button type="submit" name="update">Update</button>
      </form>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>