<?php
require("functions.php");
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$query = "select * from category";
$cat_name = "";
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
          <a href="manage_cat.php">Manage Category</a>
        </div>
      </div>
      <div class="card-body">
        <form>
          <table class="table">
            <tr>
              <th>Category Name</th>
            </tr>

            <?php
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
              <tr>
                <td>
                  <?php echo $row['cat_name']; ?>
                </td>
              </tr>

              <?php
            }
            ?>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>