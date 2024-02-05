<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$book_name = "";
$author = "";
$category = "";
$book_no = "";
$price = "";
$query = "SELECT books.book_name, books.book_no, books.book_price, authors.author_name 
          FROM books 
          LEFT JOIN authors ON books.author_id = authors.author_id";
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
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Registered Books Detail</h1>
        <div class="header-button">
          <a href="add_book.php">
            <i class="fa-solid fa-plus"></i>
          </a>
          <a href="manage_book.php">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
        </div>
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
              $query_run = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['book_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['author_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['book_price']; ?>
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
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>