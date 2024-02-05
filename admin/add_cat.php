<?php
session_start();

if (isset($_POST['add_cat'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");

  // Validate and sanitize user input
  $cat_name = mysqli_real_escape_string($connection, $_POST['cat_name']);

  // Insert data into the category table
  $query = "INSERT INTO category (cat_name) VALUES ('$cat_name')";
  $query_run = mysqli_query($connection, $query);

  // Check for errors
  if ($query_run) {
    // Query executed successfully
    header("Location: manage_cat.php");
    exit();
  } else {
    // Error in query execution
    echo "Error adding category: " . mysqli_error($connection);
  }
  // Close the connection
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