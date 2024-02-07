<?php
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
function fetchAuthors($connection)
{
  $authors = array();
  $result = mysqli_query($connection, "SELECT * FROM authors");
  while ($row = mysqli_fetch_assoc($result)) {
    $authors[] = $row;
  }
  return $authors;
}

function fetchCategories($connection)
{
  $categories = array();
  $result = mysqli_query($connection, "SELECT * FROM category");
  while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
  }
  return $categories;
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

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <script type="text/javascript">
    function alertMsg(message) {
      alert(message);
      window.location.href = "Regbooks.php";
    }
  </script>
  <title>PUP Library</title>
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Add Books</h1>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Book Name:</label>
            <input type="text" name="book_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="author">Author:</label>
            <select name="book_author" class="form-control" required>
              <option value="" disabled selected>Select Author</option>
              <?php
              $authors = fetchAuthors($connection);
              foreach ($authors as $author) {
                echo '<option value="' . $author['author_id'] . '">' . $author['author_name'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="category">Category:</label>
            <select name="book_category" class="form-control" required>
              <option value="" disabled selected>Select Category</option>
              <?php
              $categories = fetchCategories($connection);
              foreach ($categories as $category) {
                echo '<option value="' . $category['cat_id'] . '">' . $category['cat_name'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="mobile">Book Number:</label>
            <input type="text" name="book_no" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="mobile">Book Price:</label>
            <input type="text" name="book_price" class="form-control" required>
          </div>
          <button type="submit" name="add_book" class="btn btn-primary">Add Book</button>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>

<?php
if (isset($_POST['add_book'])) {
  $connection = mysqli_connect("localhost", "admin", "password");
  $db = mysqli_select_db($connection, "lms");

  $bookName = $_POST['book_name'];
  $authorId = $_POST['book_author'];
  $categoryId = $_POST['book_category'];

  if (isDuplicateBook($connection, $bookName, $authorId, $categoryId)) {
    ?>
    <script type="text/javascript">
      alertMsg("Error: This book already exists in the database.");
    </script>
    <?php
  } else {
    $query = "INSERT INTO books VALUES (null, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssidi", $bookName, $authorId, $categoryId, $_POST['book_no'], $_POST['book_price']);
    $query_run = mysqli_stmt_execute($stmt);

    if ($query_run) {
      ?>
      <script type="text/javascript">
        alertMsg("Book added successfully...");
      </script>
      <?php
    } else {
      ?>
      <script type="text/javascript">
        alertMsg("Error adding book: <?php echo mysqli_error($connection); ?>");
      </script>
      <?php
    }
    mysqli_stmt_close($stmt);
  }

  mysqli_close($connection);
}
?>