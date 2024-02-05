<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$query = "select issued_books.s_no, issued_books.book_name,issued_books.book_author,issued_books.book_no,users.name from issued_books left join users on issued_books.student_id = users.id where issued_books.status = 1";
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
        <h1>Issued Books Detail</h1>
        <div class="header-button">
          <a href="issue_book.php">Issue Book</a>
        </div>
      </div>
      <div class="card-body">
        <form>
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Author</th>
                <th>Number</th>
                <th>Student Name</th>
                <th>Return Book</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query_run = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['s_no']; ?>
                  </td>
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
                  <td>
                    <button onclick="returnBook(<?php echo $row['s_no']; ?>)">
                      <i class="fa-solid fa-check-to-slot"></i>
                    </button>
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

<script>
  function returnBook(s_no) {
    event.preventDefault();
    window.location.href = 'return_book.php?s_no=' + s_no;
  }
</script>

<?php include('../includes/footer.php'); ?>

</html>