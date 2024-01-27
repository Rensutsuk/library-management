<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$mobile = "";
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