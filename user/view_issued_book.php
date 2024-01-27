<?php
session_start();

#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$book_name = "";
$author = "";
$book_no = "";
$query = "select book_name,book_author,book_no from issued_books where student_id = $_SESSION[id] and status = 1";
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
        <h1>Issued Book's Detail</h1>
      </div>
      <div class="card-body">
        <table class="book-table">
          <thead>
            <tr>
              <th>Book Name</th>
              <th>Book Author</th>
              <th>Book Number</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
              <tr>
                <td>
                  <?php echo $row['book_name']; ?>
                </td>
                <td>
                  <?php echo $row['book_author']; ?>
                </td>
                <td>
                  <?php echo $row['book_no']; ?>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>