<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

$cat_id = "";
$cat_name = "";

$query = "SELECT * FROM category WHERE cat_id = $_GET[cid]";
$query_run = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_run)) {
  $cat_name = $row['cat_name'];
  $cat_id = $row['cat_id'];
}

if (isset($_POST['update_cat'])) {
  $new_cat_name = mysqli_real_escape_string($connection, $_POST['cat_name']);

  $duplicate_query = "SELECT * FROM category WHERE cat_name = '$new_cat_name' AND cat_id != $cat_id";
  $duplicate_result = mysqli_query($connection, $duplicate_query);

  if (mysqli_num_rows($duplicate_result) > 0) {
    echo '<script>alert("Category name already exists!");</script>';
  } else {
    $update_query = "UPDATE category SET cat_name = '$new_cat_name' WHERE cat_id = $cat_id";
    $update_result = mysqli_query($connection, $update_query);
    if ($update_result) {
      echo '<script>alert("Category updated successfully!"); window.location.href = "manage_cat.php";</script>';
    } else {
      echo '<script>alert("Error updating category!");</script>';
    }
  }
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
        <h1>Edit Category</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" required>
          </div>
          <button type="submit" name="update_cat" class="btn btn-primary">Update Category</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>