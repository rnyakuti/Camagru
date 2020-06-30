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
				<img src="../images/3069185.svg" alt="fish" style="margin-top:-25px; background-position: center;  background-repeat: no-repeat; " width="100" height="50">
        <p style="margin: -16px 0 -3px; font-size:23px; ">camagru</p>
			</div></a>
  <div class="header-right">
    <a href="#home" style=" font-size:1.2em">MY PROFILE</a>
    <a href="#contact" style=" font-size:1.2em">EXPLORE</a>
	 <a href="#contact" style=" font-size:1.2em">SETTINGS</a>
    <a href="functions/logOut.php" style=" font-size:1.2em">LOGOUT</a>
	
  </div>
</div>

	<div class="container" style="min-height:100vh;">

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
		<div class="layout">  
  <div class="row">
  <div class="center">
    <button class="btn btn-primary" id="capture-btn">Capture</button>
    <input type="file" name="file" class="btn btn-primary">
  </div>
    <div class="cell">
      <video id="player" autoplay></video>
    </div>
    <div class="cell"></div>
      <canvas id="canvas" width="640px" height="480px"></canvas>
    </div>
  </div>

  <div id="pick-image">
    <label>Video is not supported. Pick an Image instead</label>
    <input type="file" accept="image/*" id="image-picker">
  </div>
</div>

<script src="script.js"></script>
	</div>
</body>
</head>
</html> 