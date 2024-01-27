<?php
session_start();
require("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <title>PUP Library</title>
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="dashboard-content">
    <div class="card">
      <div class="card-header">
        <h1>Registered User</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No. total Users:
          <?php echo get_user_count(); ?>
        </p>
        <a href="regusers.php" >View Registered Users</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>Total Book</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No of books available:
          <?php echo get_book_count(); ?>
        </p>
        <a class href="Regbooks.php">View All Books</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>Book Categories</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No of Book's Categories:
          <?php echo get_category_count(); ?>
        </p>
        <a href="Regcat.php">View Categories</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>No. of Authors</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No of Authors:
          <?php echo get_author_count(); ?>
        </p>
        <a href="Regauthor.php">View Authors</a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>Book Issued</h1>
      </div>
      <div class="card-body">
        <p class="card-text">No of book issued:
          <?php echo get_issue_book_count(); ?>
        </p>
        <a href="view_issued_book.php">View Issued Books</a>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>