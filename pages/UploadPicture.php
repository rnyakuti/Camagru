<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>camagru [rnyakuti]</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../styles/home.css">
<body>
<div class="header">
  <a href="#default" class="logo"><div class="logos">
				<img src="https://image.flaticon.com/icons/svg/3069/3069185.svg" alt="fish" style="margin-top:-25px; background-position: center;  background-repeat: no-repeat; " width="100" height="50">
        <p style="margin: -16px 0 -3px; font-size:23px; ">camagru</p>
			</div></a>
  <div class="header-right">
    <a href="#home" style=" font-size:1.2em">MY PROFILE</a>
    <a href="#contact" style=" font-size:1.2em">EXPLORE</a>
	 <a href="#contact" style=" font-size:1.2em">SETTINGS</a>
    <a href="functions/logOut.php" style=" font-size:1.2em">LOGOUT</a>
	
  </div>
</div>

<header>

	<div class="container">

		<div class="profile">

			<div class="profile-image">

				<img src="https://image.flaticon.com/icons/svg/3043/3043931.svg"  width="130" height="130" alt="">

			</div>

			<div class="profile-user-settings">

				<h3 style =  "font-size: 1.5em; margin-bottom: 10px;"> <?php
  					$u = $_SESSION['username'] ;
				?> <?=  "{$u}"?></h3>

			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count">Upload or take a picture and share it with everyone</span> Add a filter to have some fun with the pictures</li>
				</ul>

			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>

<main>

<div class="container" style="min-height: 100vh;">



	</div>
	<!-- End of container -->

</main>
 <div class="footer">
  <p style="margin-top:50px; font-size: 15px;padding-top:30px;">rnyakuti &copy; </p>
</div>

</body>
</head>
</html> 