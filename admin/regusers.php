<?php
session_start();
#fetch data from database 
$connection = mysqli_connect("localhost", "admin", "password");
$db = mysqli_select_db($connection, "lms");
$name = "";
$email = "";
$password = "";
$mobile = "";
$address = "";
$query = "select * from users";
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

  <div class="content">
    <div class="card">
      <div class="card-header">
        <h1>Registered Users Detail</h1>
      </div>
      <div class="card-body">
        <form>
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Address</th>
            </tr>

            <?php
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
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
              </tr>
              <?php
            }
            ?>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include('../includes/footer.php'); ?>

</html>