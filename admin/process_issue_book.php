<?php
session_start();

$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

if (isset($_POST['issue_book'])) {
  $bookNo = $_POST['book_name'];
  $studentId = $_POST['student_id'];
  $issueDate = date("Y-m-d H:i:s"); // Include time in the issue date

  // Retrieve book information from the 'books' table
  $query = "SELECT b.book_name, a.author_name FROM books b
            JOIN authors a ON b.author_id = a.author_id
            WHERE b.book_no = $bookNo";

  echo "Query: " . $query;

  $result = mysqli_query($connection, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $bookName = $row['book_name'];
      $bookAuthor = $row['author_name'];

      // Check book availability
      $availabilityQuery = "SELECT status FROM issued_books WHERE book_no = $bookNo";
      $availabilityResult = mysqli_query($connection, $availabilityQuery);

      if ($availabilityResult) {
        $availabilityRow = mysqli_fetch_assoc($availabilityResult);
        $status = $availabilityRow['status'];

        if ($status == 0) {
          // Book is available, insert record into 'issued_books'
          $insertQuery = "INSERT INTO issued_books (book_no, book_name, book_author, student_id, status, issue_date) 
                                  VALUES ($bookNo, '$bookName', '$bookAuthor', $studentId, 1, '$issueDate')";
          $insertResult = mysqli_query($connection, $insertQuery);

          if ($insertResult) {
            // Update book status to mark it as issued
            $updateStatusQuery = "UPDATE issued_books SET status = 1 WHERE book_no = $bookNo";
            $updateStatusResult = mysqli_query($connection, $updateStatusQuery);

            if ($updateStatusResult) {
              $message = "Book issued successfully.";
            } else {
              $message = "Error updating book status: " . mysqli_error($connection);
            }
          } else {
            $message = "Error issuing book: " . mysqli_error($connection);
          }
        } else {
          $message = "Book is not available.";
        }
      } else {
        $message = "Error fetching availability information: " . mysqli_error($connection);
      }
    } else {
      $message = "No data returned from the query for book number $bookNo";
    }
  } else {
    $message = "Error in query: " . mysqli_error($connection) . ". Query: " . $query;
  }

  // Redirect back to the form UI with a message
  header("Location: issue_book.php?message=" . urlencode($message));
  exit();
}
?>