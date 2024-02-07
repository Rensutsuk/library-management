<?php
session_start();
function get_user_issue_book_count()
{
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");
  $user_issue_book_count = 0;
  $query = "select count(*) as user_issue_book_count from issued_books where student_id = $_SESSION[id]";
  $query_run = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($query_run)) {
    $user_issue_book_count = $row['user_issue_book_count'];
  }
  return ($user_issue_book_count);
}

function get_book_count()
{
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");
  $book_count = 0;

  $query = "SELECT COUNT(*) AS book_count FROM books";
  $stmt = mysqli_prepare($connection, $query);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $book_count);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);

  return $book_count;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/user.css" />
  <title>PUP Library</title>
</head>

<body>
  <?php include('user_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Books Issued</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No of book issued:
          <?php echo get_user_issue_book_count(); ?>
        </p>
        <a href="view_issued_book.php">View Issued Books</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>Book Catalouge</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No of books:
          <?php echo get_book_count(); ?>
        </p>
        <a href="Regbooks.php">View Book Catalouge</a>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>