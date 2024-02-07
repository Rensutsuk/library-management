<?php
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

if (isset($_GET['s_no'])) {
  $query = "DELETE FROM issued_books WHERE s_no = ?";
  $stmt = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($stmt, "i", $_GET['s_no']);
  $query_run = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($connection);
  
  if ($query_run) {
    ?>
    <script type="text/javascript">
      alert("Book Return successfull...");
      window.location.href = "view_issued_book.php";
    </script>
    <?php
  } else {
    ?>
    <script type="text/javascript">
      alert("Book Return unsuccessfull...");
      window.location.href = "view_issued_book.php";
    </script>
    <?php
    echo "Error updating status: " . mysqli_error($connection);
  }
} else {
  echo "Record identifier not provided.";
}
?>