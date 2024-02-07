<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

if (isset($_POST['add_book'])) {
  $bookName = $_POST['book_name'];
  $authorId = $_POST['book_author'];
  $categoryId = $_POST['book_category'];
  $bookNo = $_POST['book_no'];
  $bookPrice = $_POST['book_price'];

  if (isDuplicateBook($connection, $bookName, $authorId, $categoryId)) {
    echo "Error: This book already exists in the database.";
  } else {
    $query = "INSERT INTO books (book_name, author_id, cat_id, book_no, book_price) 
                    VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "siiid", $bookName, $authorId, $categoryId, $bookNo, $bookPrice);
    $query_run = mysqli_stmt_execute($stmt);

    if ($query_run) {
      echo "Book added successfully...";
    } else {
      echo "Error adding book: " . mysqli_error($connection);
    }
    mysqli_stmt_close($stmt);
  }
  mysqli_close($connection);
}

function isDuplicateBook($connection, $bookName, $authorId, $categoryId)
{
  $query = "SELECT * FROM books WHERE book_name = ? AND author_id = ? AND cat_id = ?";
  $stmt = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($stmt, "sii", $bookName, $authorId, $categoryId);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $numRows = mysqli_stmt_num_rows($stmt);
  mysqli_stmt_close($stmt);
  return $numRows > 0;
}
?>