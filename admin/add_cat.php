<?php
session_start();

if (isset($_POST['add_cat'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");
  $cat_name = mysqli_real_escape_string($connection, $_POST['cat_name']);

  $checkQuery = "SELECT * FROM category WHERE cat_name = '$cat_name'";
  $checkResult = mysqli_query($connection, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    echo '<script>alert("Category already exists.");</script>';
  } else {
    $query = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
      echo '<script>alert("Category added successfully.");</script>';
      header("Location: Regcat.php");
      exit();
    } else {
      echo '<script>alert("Error adding category.");</script>';
    }
  }
  mysqli_close($connection);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <title>PUP Library</title>
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Add Category</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" name="cat_name" required>
          </div>
          <button type="submit" name="add_cat" class="btn btn-primary">Add Catogry</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>