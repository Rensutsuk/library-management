<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/admin.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://kit.fontawesome.com/999878f824.js" crossorigin="anonymous"></script>
  <title>PUP Library</title>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable({});
    });
  </script>
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Manage Author Details</h1>
        <div class="header-button">
          <a href="add_author.php">
            <i class="fa-solid fa-plus"></i>
          </a>
        </div>
      </div>
      <div class="card-body">
        <form>
          <table id="myTable" class="table">
            <thead>
              <tr>
                <th>Author ID</th>
                <th>Author Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $connection = mysqli_connect("localhost", "admin", "password");
              $db = mysqli_select_db($connection, "lms");
              $query = "SELECT * FROM authors";
              $query_run = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['author_id']; ?>
                  </td>
                  <td>
                    <?php echo $row['author_name']; ?>
                  </td>
                  <td>
                    <button class="btn" name=""><a href="edit_author.php?auth_id=<?php echo $row['author_id']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i></a></button>
                    <button class="btn"><a href="delete_author.php?auth_id=<?php echo $row['author_id']; ?>">
                        <i class="fa-solid fa-trash"></i></a></button>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>