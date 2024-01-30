<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$book_name = "";
$author = "";
$category = "";
$book_no = "";
$price = "";
$query = "select books.book_name,books.book_no,book_price,authors.author_name from books left join authors on books.author_id = authors.author_id";
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
        <h1>Registered Books Detail</h1>
        <div class="header-button">
          <a href="add_book.php">Add Book</a>
          <a href="manage_book.php">Manage Book</a>
        </div>
      </div>
      <div class="card-body">
        <form>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Author</th>
              <th>Price</th>
              <th>Number</th>
            </tr>

            <?php
            $query_run = mysqli_query($connection,$query);
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
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>