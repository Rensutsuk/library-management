<?php
require("functions.php");
session_start();
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
        <h1>Registered Book's Category</h1>
        <div class="header-button">
          <a href="add_cat.php">Add Category</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php
          $connection = mysqli_connect("localhost", "admin", "password");
          $db = mysqli_select_db($connection, "lms");
          $query = "select * from category";
          $query_run = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <tr>
              <td>
                <?php echo $row['cat_name']; ?>
              </td>
              <td><button class="btn"><a href="edit_cat.php?cid=<?php echo $row['cat_id']; ?>">Edit</a></button>
                <button class="btn"><a href="delete_cat.php?cid=<?php echo $row['cat_id']; ?>">Delete</a></button>
              </td>
            </tr>
          <?php
          }
          ?>
        </table>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>