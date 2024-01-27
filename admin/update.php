<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

$query = "UPDATE admins SET name = '$name', email = '$email', mobile = '$mobile' WHERE email = '$_SESSION[admin_email]'";
error_log($query);

$query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "admin_dashboard.php";
</script>
