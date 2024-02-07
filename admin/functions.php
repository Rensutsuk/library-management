<?php
function get_author_count()
{
    $connection = mysqli_connect("localhost", "admin", "password");
    $db = mysqli_select_db($connection, "lms");
    $author_count = 0;

    $query = "SELECT COUNT(*) AS author_count FROM authors";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $author_count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $author_count;
}

function get_user_count()
{
    $connection = mysqli_connect("localhost", "admin", "password");
    $db = mysqli_select_db($connection, "lms");
    $user_count = 0;

    $query = "SELECT COUNT(*) AS user_count FROM users";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $user_count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $user_count;
}

function get_book_count()
{
    $connection = mysqli_connect("localhost", "admin", "password");
    $db = mysqli_select_db($connection, "lms");
    $book_count = 0;

    $query = "SELECT COUNT(*) AS book_count FROM books";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $book_count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $book_count;
}

function get_issue_book_count()
{
    $connection = mysqli_connect("localhost", "admin", "password");
    $db = mysqli_select_db($connection, "lms");
    $issue_book_count = 0;

    $query = "SELECT COUNT(*) AS issue_book_count FROM issued_books WHERE status = 1";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $issue_book_count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $issue_book_count;
}

function get_category_count()
{
    $connection = mysqli_connect("localhost", "admin", "password");
    $db = mysqli_select_db($connection, "lms");
    $cat_count = 0;

    $query = "SELECT COUNT(*) AS cat_count FROM category";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cat_count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $cat_count;
}
?>
