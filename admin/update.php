<?php
session_start();

if (isset($_POST['update'])) {
	$connection = mysqli_connect("localhost", "admin", "password");
	$db = mysqli_select_db($connection, "lms");

	$newName = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];

	if (isDuplicateName($connection, $newName, $email)) {
		echo "<script>alert('Error: This name is already taken. Please choose a different name.');</script>";
		header("Location: edit_profile.php");
		exit();
	} else {
		$query = "UPDATE admins SET name = ?, mobile = ? WHERE email = ?";
		$stmt = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($stmt, "sss", $newName, $mobile, $email);
		$query_run = mysqli_stmt_execute($stmt);

		if ($query_run) {
			echo "<script>alert('Profile updated successfully...');</script>";
			header("Location: view_profile.php");
			exit();
		} else {
			echo "<script>alert('Error updating profile: " . mysqli_error($connection) . "');</script>";
		}
		mysqli_stmt_close($stmt);
	}
	mysqli_close($connection);
}

function isDuplicateName($connection, $newName, $email)
{
	$query = "SELECT * FROM admins WHERE name = ? AND email != ?";
	$stmt = mysqli_prepare($connection, $query);
	mysqli_stmt_bind_param($stmt, "ss", $newName, $email);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$numRows = mysqli_stmt_num_rows($stmt);
	mysqli_stmt_close($stmt);
	return $numRows > 0;
}
?>