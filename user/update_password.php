<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

// Check if old password matches
$query = "SELECT * FROM users WHERE email = ? LIMIT 1";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
	if ($_POST['old_password'] === $row['password']) {
		// Update password
		$updateQuery = "UPDATE users SET password = ? WHERE email = ?";
		$updateStmt = mysqli_prepare($connection, $updateQuery);
		mysqli_stmt_bind_param($updateStmt, "ss", $_POST['new_password'], $_SESSION['email']);
		mysqli_stmt_execute($updateStmt);

		if ($updateStmt) {
			?>
			<script type="text/javascript">
				alert("Password updated successfully...");
				window.location.href = "user_dashboard.php";
			</script>
			<?php
			exit(); // Stop further execution
		} else {
			echo "Error updating password: " . mysqli_error($connection);
		}
	} else {
		?>
		<script type="text/javascript">
			alert("Wrong User Password...");
			window.location.href = "change_password.php";
		</script>
		<?php
		exit(); // Stop further execution
	}
} else {
	echo "Error retrieving user information: " . mysqli_error($connection);
}
?>