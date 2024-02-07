<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <title>PUP Library - Issue Book</title>
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Issue Book</h1>
      </div>
      <div class="card-body">
        <form action="process_issue_book.php" method="post">
          <div class="form-group">
            <label for="book_name">Book Name:</label>
            <select name="book_name" class="form-control" required>
              <option value="">- Select Book -</option>
              <?php
              $connection = mysqli_connect("localhost", "admin", "password");
              $db = mysqli_select_db($connection, "lms");

              $bookQuery = "SELECT book_no, book_name FROM books";
              $bookResult = mysqli_query($connection, $bookQuery);

              while ($bookRow = mysqli_fetch_assoc($bookResult)) {
                echo "<option value='" . $bookRow['book_no'] . "'>" . $bookRow['book_name'] . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="student_id">Student ID:</label>
            <select name="student_id" class="form-control" required>
              <option value="">- Select Student -</option>
              <?php
              $studentQuery = "SELECT id, name FROM users";
              $studentResult = mysqli_query($connection, $studentQuery);

              while ($studentRow = mysqli_fetch_assoc($studentResult)) {
                echo "<option value='" . $studentRow['id'] . "'>" . $studentRow['name'] . "</option>";
              }
              ?>
            </select>
          </div>
          <button type="submit" name="issue_book" class="btn btn-primary">Issue Book</button>
        </form>

        <?php
        if (isset($_GET['message'])) {
          $message = urldecode($_GET['message']);
          echo "<p class='message'>$message</p>";
        }
        ?>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>