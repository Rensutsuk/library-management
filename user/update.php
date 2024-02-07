<?php
session_start();

$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

if (isset($_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['address'])) {
	$query = "UPDATE users SET name = ?, email = ?, mobile = ?, address = ? WHERE email = ?";
	$stmt = mysqli_prepare($connection, $query);

	if ($stmt) {
		mysqli_stmt_bind_param($stmt, "sssss", $_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['address'], $_SESSION['email']);

		if (mysqli_stmt_execute($stmt)) {
			mysqli_stmt_close($stmt);
			echo '<script type="text/javascript">
                    alert("Updated successfully...");
                    window.location.href = "view_profile.php"; 
                  </script>';
			exit;
		} else {
			echo "Error: " . mysqli_error($connection);
		}
	} else {
		echo "Error: " . mysqli_error($connection);
	}
} else {
	echo "Error: Required fields are missing.";
}
?>