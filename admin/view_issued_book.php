<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$book_name = "";
$author = "";
$book_no = "";
$student_name = "";
$query = "select issued_books.book_name,issued_books.book_author,issued_books.book_no,users.name from issued_books left join users on issued_books.student_id = users.id where issued_books.status = 1";
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
        <h1>Issed Books Detail</h1>
      </div>
      <div class="card-body">
        <form>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Author</th>
              <th>Number</th>
              <th>Student Name</th>
            </tr>
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
                <td>
                  <?php echo $row['name']; ?>
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