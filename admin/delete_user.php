<?php
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

$query = "DELETE FROM users WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "i", $_GET['id']);
$query_run = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($connection);

if ($query_run) {
  ?>
  <script type="text/javascript">
    alert("User Deleted successfully...");
    window.location.href = "regusers.php";
  </script>
  <?php
} else {
  ?>
  <script type="text/javascript">
    alert("Error deleting user: <?php echo mysqli_error($connection); ?>");
    window.location.href = "regusers.php";
  </script>
  <?php
}
?>