<div class="navbar">
  <div class="logo-head">
    <img src="../assets/logo.png" alt="puplogo" class="logo" />
    <div class="logo-title">
      <h1>
        POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
      </h1>
      <h3>The Country’s First Polytechnic University</h3>
    </div>
  </div>
  <div class="nav-links">
    <h2>
      <a href="user_dashboard.php">Home</a>
    </h2> |
    <div class="user-dropdown" onclick="toggleUserOptions()">
      <img src="../assets/user-icon.png" alt="User Icon" class="user-icon">
      <span class="username">
        <?php echo $_SESSION['name']; ?>
      </span>
      <ul id="userOptions" class="user-options">
        <li><a href="view_profile.php">View Profile</a></li>
        <li><a href="edit_profile.php">Edit Profile</a></li>
        <li><a href="change_password.php">Change Password</a></li>
        <li><a href="../includes/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
  function toggleUserOptions() {
    var options = document.getElementById("userOptions");
    options.classList.toggle("active");
  }
</script>