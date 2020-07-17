<?php
session_start();
//if user has logged out but trys to go back to page through browser, this will take them to log in page
if(!isset( $_SESSION['id']))
{
	header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en" >
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
    <a href="Home.php" style=" font-size:1.2em">MY PROFILE</a>
    <a href="PhotoGalleryPage.php" style=" font-size:1.2em">EXPLORE</a>
	 <a href="Settings.php" style=" font-size:1.2em">SETTINGS</a>
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

				<a class="btn profile-edit-btn" style="margin-bottom:10px; margin-left:-5px;" href="UploadPicture.php">Upload</a>

			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count">164</span> Uploads</li>
					<li><span class="profile-stat-count">188</span> Likes</li>
					<li><span class="profile-stat-count">206</span> comments</li>
				</ul>

			</div>

		</div>
 
 <div class="gallery" style="margin-top:30px">
	 
<?php

if(isset( $_SESSION['id']))
{
	try
{
	
    $servername = "localhost";
    $dusername = "root";
    $password = "";
    $dbname = "Camagru_rnyakuti";
    $name = "";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$str = "SELECT * FROM images";
	$res = $conn->query($str);
	$user_id =  $_SESSION['id'] ;
	echo '<div class="container">';
	while ($new = $res->fetch())
	{
		if($new['user_id'] == $user_id )
		{
			$img = "<img src=\"".$new['image_name']."\" class='gallery-image'>";
			echo '<div class="gallery-item" tabindex="0">';
			echo $img;
			echo '<div class="gallery-item-info">';
			echo '<ul>';
			echo '<li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i>'.$new['likes'];
			echo '<li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>';
			echo ' </ul>';
			echo '</div>';
			echo '</div>';
		}	
	}

}
catch(PDOException $e)
	{
		echo "[INFO] " . $e->getMessage();
	}

}
else
{
	echo "YOU ARE NOT LOGGED IT, LOGIN OF CHECKOUT THE PUBLIC GALLERY";
}


	 ?>
</div> 
</div>
	</div>

 <div style="background-color: #FA8072; color: white; text-align: center;margin-bottom:-30px;height:80px; bottom:0;width:100%;" >
  <p style=" font-size: 15px;padding-top:30px;">rnyakuti &copy; </p>
</div>
</body>
</html> 