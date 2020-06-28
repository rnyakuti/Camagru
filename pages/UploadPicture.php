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
		<div style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    width: 100%;
    margin: 0 auto;">
		<video id="video" width="640" height="480" autoplay></video>
		<button id="snap">Snap Photo</button>
		<canvas id="canvas" width="640" height="480"></canvas>
		</div>
	</div>
	


<div style="background-color: #FA8072; color: white; text-align: center;margin-bottom:-30px;height:80px; bottom:0;width:100%;" >
  <p style=" font-size: 15px;padding-top:30px;">rnyakuti &copy; </p>
</div>
<script>
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0,640, 480);
});
</script>
</body>
</head>
</html> 