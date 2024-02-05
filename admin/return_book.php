<?php
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

if (isset($_GET['s_no'])) {
  // Use prepared statement to make the query safer
  $query = "UPDATE issued_books SET status = 0 WHERE s_no = ?";
  $stmt = mysqli_prepare($connection, $query);

  // Bind parameters
  mysqli_stmt_bind_param($stmt, "i", $_GET['s_no']);

  // Execute the statement
  $query_run = mysqli_stmt_execute($stmt);

  // Close the statement
  mysqli_stmt_close($stmt);

  // Close the connection
  mysqli_close($connection);
  
  // Check if the query was successful
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