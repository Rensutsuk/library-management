<?php
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

// Use prepared statement to make the query safer
$query = "DELETE FROM category WHERE cat_id = ?";
$stmt = mysqli_prepare($connection, $query);

// Bind parameters
mysqli_stmt_bind_param($stmt, "i", $_GET['cid']);

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
    alert("Category Deleted successfully...");
    window.location.href = "manage_cat.php";
  </script>
  <?php
} else {
  ?>
  <script type="text/javascript">
    alert("Error deleting category: <?php echo mysqli_error($connection); ?>");
    window.location.href = "manage_cat.php";
  </script>
  <?php
}
?>