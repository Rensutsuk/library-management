<?php

$connection = mysqli_connect("localhost", "admin", "password");

if (!$connection) {
    die("Database connection failed");
}

$db = mysqli_select_db($connection, "lms");

if (!$db) {
    die("Database selection failed");
}

$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
$address = mysqli_real_escape_string($connection, $_POST['address']);

$stmt = mysqli_prepare($connection, "INSERT INTO users (name, email, password, mobile, address) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $password, $mobile, $address);

if (mysqli_stmt_execute($stmt)) {
    echo '<script>alert("Registration successful. You may now log in.");window.location.href = "../user_login.php";</script>';
} else {
    die("Error: " . mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($connection);

?>