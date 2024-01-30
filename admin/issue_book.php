<?php
session_start();

if (isset($_POST['issue_book'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");
  $query = "insert into issued_books values(null,$_POST[book_no],'$_POST[book_name]','$_POST[book_author]',$_POST[student_id],1,'$_POST[issue_date]')";
  $query_run = mysqli_query($connection, $query);
  header("Location:view_issued_book.php"); 
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
        <h1>Issue Book</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="book_name">Book Name:</label>
            <input type="text" name="book_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="book_author">Author ID:</label>
            <select class="form-control" name="book_author">
              <option>-Select author-</option>
              <?php
              $connection = mysqli_connect("localhost", "admin", "password");
              $db = mysqli_select_db($connection, "lms");
              $query = "select author_name from authors";
              $query_run = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <option>
                  <?php echo $row['author_name']; ?>
                </option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="book_no">Book Number:</label>
            <input type="text" name="book_no" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="issue_date">Issue Date:</label>
            <input type="date" name="issue_date" class="form-control" value="<?php echo date("mm-dd-yyyy"); ?>" required>
          </div>
          <button type="submit" name="issue_book" class="btn btn-primary">Issue Book</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>