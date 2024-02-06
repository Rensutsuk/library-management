<?php
session_start();

if (isset($_POST['add_author'])) {
    $connection = mysqli_connect("localhost", "admin", "password");
    $db = mysqli_select_db($connection, "lms");

    // Check if the author already exists
    $checkQuery = "SELECT * FROM authors WHERE author_name = ?";
    $checkStmt = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, "s", $_POST['author_name']);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        // Author already exists, show error message
        ?>
        <script type="text/javascript">
            alert("Author already exists. Please enter a different name.");
            window.location.href = "add_author.php";
        </script>
        <?php
    } else {
        // Author does not exist, proceed with insertion
        $query = "INSERT INTO authors VALUES (null, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $_POST['author_name']);
        $query_run = mysqli_stmt_execute($stmt);

        if ($query_run) {
            ?>
            <script type="text/javascript">
                alert("Author added successfully...");
                window.location.href = "Regauthor.php";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Could not add author...");
                window.location.href = "Regauthor.php";
            </script>
            <?php
        }
    }

    mysqli_stmt_close($checkStmt);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>

<!DOCTYPE html> <html lang="en">

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
        <h1>Add Author</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label>Author Name:</label>
            <input type="text" name="author_name" class="form-control" required>
          </div>
          <button type="submit" name="add_author" class="btn btn-primary">Add Book</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>
