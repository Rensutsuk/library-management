<?php
session_start();
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$query = "select * from users";
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
        <h1>Registered Users Detail</h1>
      </div>
      <div class="card-body">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Address</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
              $id = $row['id'];
              $name = $row['name'];
              $email = $row['email'];
              $mobile = $row['mobile'];
              $address = $row['address'];
              ?>
              <tr>
                <td>
                  <?php echo $name; ?>
                </td>
                <td>
                  <?php echo $email; ?>
                </td>
                <td>
                  <?php echo $mobile; ?>
                </td>
                <td>
                  <?php echo $address; ?>
                </td>
                <td>
                  <button class="btn"><a href="delete_user.php?id=<?php echo $row['id']; ?>">
                      <i class="fa-solid fa-trash"></i></a></button>
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

<?php include('../includes/footer.php'); ?>

</html>