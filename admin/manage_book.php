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
        <h1>Registered Books Detail</h1>
        <div class="header-button">
          <a href="add_book.php">Add Book</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Author</th>
              <th>Category</th>
              <th>ISBN No.</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php
          $connection = mysqli_connect("localhost", "admin", "password");
          $db = mysqli_select_db($connection, "lms");
          $query = "select * from books";
          $query_run = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <tr>
              <td>
                <?php echo $row['book_name']; ?>
              </td>
              <td>
                <?php echo $row['author_id']; ?>
              </td>
              <td>
                <?php echo $row['cat_id']; ?>
              </td>
              <td>
                <?php echo $row['book_no']; ?>
              </td>
              <td>
                <?php echo $row['book_price']; ?>
              </td>
              <td><button class="btn" name=""><a href="edit_book.php?bn=<?php echo $row['book_no']; ?>">Edit</a></button>
                <button class="btn"><a href="delete_book.php?bn=<?php echo $row['book_no']; ?>">Delete</a></button>
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