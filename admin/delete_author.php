<?php
session_start();

if (isset($_GET['auth_id'])) {
	$author_id = $_GET['auth_id'];

	$connection = mysqli_connect("localhost", "admin", "password");
	$db = mysqli_select_db($connection, "lms");

	// Check if the author exists
	$checkQuery = "SELECT * FROM authors WHERE author_id = ?";
	$checkStmt = mysqli_prepare($connection, $checkQuery);
	mysqli_stmt_bind_param($checkStmt, "i", $author_id);
	mysqli_stmt_execute($checkStmt);
	mysqli_stmt_store_result($checkStmt);

	if (mysqli_stmt_num_rows($checkStmt) > 0) {
		// Author exists, proceed with deletion
		$deleteQuery = "DELETE FROM authors WHERE author_id = ?";
		$deleteStmt = mysqli_prepare($connection, $deleteQuery);
		mysqli_stmt_bind_param($deleteStmt, "i", $author_id);
		mysqli_stmt_execute($deleteStmt);

		mysqli_stmt_close($checkStmt);
		mysqli_stmt_close($deleteStmt);
		mysqli_close($connection);

		// Alert for successful deletion
		echo '<script>';
		echo 'alert("Author deleted successfully.");';
		echo 'window.location.href = "manage_author.php";';
		echo '</script>';
		exit();
	} else {
		// Author does not exist
		echo '<script>';
		echo 'alert("Error: Author not found.");';
		echo 'window.location.href = "manage_author.php";';
		echo '</script>';
		exit();
	}
} else {
	// No author_id provided
	echo '<script>';
	echo 'alert("Error: Author ID not provided.");';
	echo 'window.location.href = "manage_author.php";';
	echo '</script>';
	exit();
}
?>