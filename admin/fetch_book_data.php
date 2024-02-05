<?php
if (isset($_POST['book_name'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");

  $book_name = $_POST['book_name'];

  // Fetch the author and book number based on the selected book name
  $query = "SELECT author_name, book_no FROM books WHERE book_name = '$book_name'";
  $query_run = mysqli_query($connection, $query);

  if ($query_run) {
    $result = mysqli_fetch_assoc($query_run);
    echo json_encode($result);
  } else {
    echo json_encode(['error' => 'Failed to fetch book data']);
  }
} else {
  echo json_encode(['error' => 'Invalid request']);
}
?>