<?php
if (isset($_GET['book_id'])) {
  $bookId = $_GET['book_id'];

  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");

  // Check if the book with the given book_id exists
  $checkQuery = "SELECT * FROM books WHERE book_id = ?";
  $checkStmt = mysqli_prepare($connection, $checkQuery);
  mysqli_stmt_bind_param($checkStmt, "i", $bookId);
  mysqli_stmt_execute($checkStmt);
  mysqli_stmt_store_result($checkStmt);

  if (mysqli_stmt_num_rows($checkStmt) > 0) {
    // Book exists, proceed with deletion
    $deleteQuery = "DELETE FROM books WHERE book_id = ?";
    $deleteStmt = mysqli_prepare($connection, $deleteQuery);
    mysqli_stmt_bind_param($deleteStmt, "i", $bookId);
    mysqli_stmt_execute($deleteStmt);

    mysqli_stmt_close($checkStmt);
    mysqli_stmt_close($deleteStmt);
    mysqli_close($connection);

    // JavaScript alert script for success and redirect
    echo '<script>';
    echo 'alert("Book has been deleted successfully.");';
    echo 'window.location.href = "manage_book.php";';
    echo '</script>';
  } else {
    // JavaScript alert script for error and redirect
    echo '<script>';
    echo 'alert("Error: Book not found.");';
    echo 'window.location.href = "manage_book.php";';
    echo '</script>';
  }
} else {
  // JavaScript alert script for error and redirect
  echo '<script>';
  echo 'alert("Error: Book ID not provided.");';
  echo 'window.location.href = "manage_book.php";';
  echo '</script>';
}
?>