<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

$query = "SELECT books.book_name, books.book_no, books.book_price, authors.author_name 
          FROM books 
          LEFT JOIN authors ON books.author_id = authors.author_id";

$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $book_name, $book_no, $book_price, $author_name);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/999878f824.js" crossorigin="anonymous"></script>
  <title>PUP Library</title>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable({});
    });
  </script>
</head>

<body>
  <?php include('user_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Book Catalouge</h1>
      </div>
      <div class="card-body">
        <form>
          <table id="myTable" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Book Number</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while (mysqli_stmt_fetch($stmt)) {
                ?>
                <tr>
                  <td>
                    <?php echo $book_name; ?>
                  </td>
                  <td>
                    <?php echo $author_name; ?>
                  </td>
                  <td>
                    <?php echo $book_price; ?>
                  </td>
                  <td>
                    <?php echo $book_no; ?>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>