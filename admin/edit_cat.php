<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$cat_id = "";
$cat_name = "";
$query = "select * from category where cat_id = $_GET[cid]";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
  $cat_name = $row['cat_name'];
  $cat_id = $row['cat_id'];
}

if (isset($_POST['update_cat'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");
  $query = "update category set cat_name = '$_POST[cat_name]' where cat_id = $_GET[cid]";
  $query_run = mysqli_query($connection, $query);
  header("location:manage_cat.php");
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
        <h1>Add Books</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>" required>
          </div>
          <button type="submit" name="update_cat" class="btn btn-primary">Update Catogry</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>