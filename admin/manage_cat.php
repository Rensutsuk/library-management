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
</head>

<body>
  <?php include('admin_navbar.php') ?>

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Registered Book's Category</h1>
        <div class="header-button">
          <a href="add_cat.php">
            <i class="fa-solid fa-plus"></i>
          </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $connection = mysqli_connect("localhost", "admin", "password");
            $db = mysqli_select_db($connection, "lms");
            $query = "select * from category";
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
              ?>
              <tr>
                <td>
                  <?php echo $row['cat_name']; ?>
                </td>
                <td>
                  <button class="btn edit-btn" data-cat-id="<?php echo $row['cat_id']; ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                  <button class="btn delete-btn" data-cat-id="<?php echo $row['cat_id']; ?>">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable({});

    $('.edit-btn').click(function () {
      var catId = $(this).data('cat-id');
      window.location.href = 'edit_cat.php?cid=' + catId;
    });

    $('.delete-btn').click(function () {
      var catId = $(this).data('cat-id');
      window.location.href = 'delete_cat.php?cid=' + catId;
    });
  });
</script>

<?php include('../includes/footer.php'); ?>

</html>