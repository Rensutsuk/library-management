<?php
session_start();

$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");

if (isset($_POST['issue_book'])) {
    $bookNo = $_POST['book_name'];
    $studentId = $_POST['student_id'];
    $issueDate = date("Y-m-d H:i:s"); // Include time in the issue date

    // Check if the book is already issued
    $availabilityQuery = "SELECT status FROM issued_books WHERE book_no = $bookNo";
    $availabilityResult = mysqli_query($connection, $availabilityQuery);

    if ($availabilityResult) {
        $availabilityRow = mysqli_fetch_assoc($availabilityResult);
        $status = $availabilityRow['status'];

        if ($status == 0) {
            // Book is available, insert record into 'issued_books'
            $query = "INSERT INTO issued_books (book_no, book_name, book_author, student_id, status, issue_date) 
                      VALUES ($bookNo, (SELECT book_name FROM books WHERE book_no = $bookNo), 
                              (SELECT author_name FROM authors JOIN books ON authors.author_id = books.author_id WHERE book_no = $bookNo),
                              $studentId, 1, '$issueDate')";
            $insertResult = mysqli_query($connection, $query);

            if ($insertResult) {
                $message = "Book issued successfully.";
            } else {
                $message = "Error issuing book: " . mysqli_error($connection);
            }
        } else {
            $message = "Book is not available.";
        }
    } else {
        $message = "Error fetching availability information: " . mysqli_error($connection);
    }

    // Redirect back to the form UI with a message
    header("Location: issue_book.php?message=" . urlencode($message));
    exit();
}
?>
