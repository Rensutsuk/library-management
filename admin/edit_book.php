<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$book_name = "";
$book_no = "";
$author_id = "";
$cat_id = "";
$book_price = "";
$query = "SELECT * FROM books WHERE book_id = $_GET[book_id]";
$query_run = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
  $book_name = $row['book_name'];
  $book_no = $row['book_no'];
  $author_id = $row['author_id'];
  $cat_id = $row['cat_id'];
  $book_price = $row['book_price'];
}

if (isset($_POST['update'])) {
  // Check for duplicate book name
  $check_query = "SELECT * FROM books WHERE book_name = '$_POST[book_name]' AND book_id != $_GET[book_id]";
  $check_result = mysqli_query($connection, $check_query);
  if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('Error: Book name already exists.');</script>";
  } else {
    $update_query = "UPDATE books SET book_name = '$_POST[book_name]', author_id = $_POST[author_id], cat_id = $_POST[cat_id], book_price = $_POST[book_price] WHERE book_id = $_GET[book_id]";
    $update_result = mysqli_query($connection, $update_query);
    if ($update_result) {
      header("location:manage_book.php");
    } else {
      echo "<script>alert('Error updating book.');</script>";
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
        <h1>Edit Book</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="mobile">Book Number:</label>
            <input type="text" name="book_no" value="<?php echo $book_no; ?>" class="form-control" disabled required>
          </div>
          <div class="form-group">
            <label for="email">Book Name:</label>
            <input type="text" name="book_name" value="<?php echo $book_name; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Author ID:</label>
            <input type="text" name="author_id" value="<?php echo $author_id; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Category ID:</label>
            <input type="text" name="cat_id" value="<?php echo $cat_id; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Book Price:</label>
            <input type="text" name="book_price" value="<?php echo $book_price; ?>" class="form-control" required>
          </div>
          <button type="submit" name="update" class="btn btn-primary">Update Book</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>
