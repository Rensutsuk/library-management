<?php
require("functions.php");
session_start();

// Fetch data from the database
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$mobile = "";

// Use a prepared statement to make the query safer
$query = "SELECT * FROM admins WHERE email = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);
mysqli_stmt_execute($stmt);
$query_run = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($query_run)) {
  $name = $row['name'];
  $email = $row['email'];
  $mobile = $row['mobile'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <script type="text/javascript">
    function alertMsg() {
      alert(Book added successfully...);
      window.location.href = "admin_dashboard.php";
    } 
  </script>
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
            <label for="email">Book Name:</label>
            <input type="text" name="book_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Author ID:</label>
            <input type="text" name="book_author" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Category ID:</label>
            <input type="text" name="book_category" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Book Number:</label>
            <input type="text" name="book_no" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Book Price:</label>
            <input type="text" name="book_price" class="form-control" required>
          </div>
          <button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>

<?php
if (isset($_POST['add_book'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");

  // Use prepared statement to make the query safer
  $query = "INSERT INTO books VALUES (null, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($connection, $query);

  // Bind parameters
  mysqli_stmt_bind_param($stmt, "sssid", $_POST['book_name'], $_POST['book_author'], $_POST['book_category'], $_POST['book_no'], $_POST['book_price']);

  // Execute the statement
  $query_run = mysqli_stmt_execute($stmt);

  if ($query_run) {
    // Query executed successfully
    ?>
    <script type="text/javascript">
      alert("Book added successfully...");
      window.location.href = "admin_dashboard.php";
    </script>
    <?php
  } else {
    // Error in query execution
    echo "Error adding book: " . mysqli_error($connection);
  }

  // Close the statement
  mysqli_stmt_close($stmt);
  // Close the connection
  mysqli_close($connection);
}
?>