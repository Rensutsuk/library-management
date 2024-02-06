<?php
session_start();

if (isset($_GET['auth_id'])) {
  $authorId = $_GET['auth_id'];

  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");
  $query = "SELECT * FROM authors WHERE author_id = $authorId";
  $query_run = mysqli_query($connection, $query);

  if (mysqli_num_rows($query_run) > 0) {
    $row = mysqli_fetch_assoc($query_run);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/admin.css" />
      <title>Edit Author</title>
    </head>

    <body>
      <?php include('admin_navbar.php') ?>

      <div class="content">
        <div class="card">
          <div class="card-header">
            <h1>Edit Author</h1>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <input type="hidden" name="author_id" value="<?php echo $row['author_id']; ?>">
              <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" name="author_name" class="form-control" value="<?php echo $row['author_name']; ?>" required>
              </div>
              <button type="submit" name="update_author" class="btn btn-primary">Update</button>
            </form>
            <?php
            if (isset($_POST['update_author'])) {
              $authorId = $_POST['author_id'];
              $authorName = $_POST['author_name'];

              $updateQuery = "UPDATE authors SET author_name = '$authorName' WHERE author_id = $authorId";
              $updateResult = mysqli_query($connection, $updateQuery);

              if ($updateResult) {
                echo '<script>alert("Author updated successfully.");</script>';
                echo '<script>window.location.href = "manage_author.php";</script>';
              } else {
                echo "Error updating author: " . mysqli_error($connection);
              }
            }
            ?>
          </div>
        </div>
      </div>
    </body>

    <?php include('../includes/footer.php'); ?>

    </html>
    <?php
  } else {
    echo "Author not found.";
  }
} else {
  echo "Author ID not provided.";
}
?>