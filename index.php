<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style.css" />
	<title>PUP Library</title>
</head>

<body>
	<div class="navbar">
		<div class="logo-head">
			<img src="assets/logo.png" alt="puplogo" class="logo" />
			<div class="logo-title">
				<h1>
					POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
				</h1>
				<h3>The Country’s First Polytechnic University</h3>
			</div>
		</div>
		<div class="nav-links">
			<h2>
				<a href="user_login.php">Login</a>
				<a href="signup.php">Sign Up</a>
			</h2>
		</div>
	</div>
	<div class="content">
		<h1>University Library and Learning Resources Center</h1>
		<p>
			The heart of the university, the University Library and Learning Resource Center is one of the major service
			centers of the Polytechnic University of the Philippines. As such, it strives to meet the academic and related
			needs of its clientele through the provision of adequate and efficient library and information services.
			<br><br>The University Librarry serves as the University's gateway to the global information society, and provides
			various services and development of programs to its clientele.
		</p>

		<div class="director-section">
			<div class="director-content">
				<h1>Message from the Director</h1>
				<p>
					Welcome to the University Library and Learning Resource Center!
					<br><br>It gives me great pleasure to welcome you to the Ninoy Aquino Library and Learning Resource Center.
					The entire workforce of the library supports you in your studies. The library will ensure ease facilitation of
					learning by providing you with quality and excellent service.
					<br><br>To God be the glory!
					<br><br>Marcela R. Figura. RL, MLIS
				</p>
			</div>
			<img src="assets/director_image.jpg" alt="Director Image" class="director-image">
		</div>
	</div>
</body>

<?php include('includes/footer.php'); ?>

<script>
	document.addEventListener("DOMContentLoaded", function () {
		var content = document.querySelector(".content");
		content.classList.add("loaded");
	});
</script>

</html>