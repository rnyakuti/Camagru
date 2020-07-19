<?php
    session_start();
    if(!isset( $_SESSION['id']))
{
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
      <title>camagru [rnyakuti]</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="../styles/home.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div class="header">
  <a href="#default" class="logo">
    <div class="logos">
      <img src="../images/3069185.svg" alt="fish" style="margin-top:-25px; background-position: center;  background-repeat: no-repeat; " width="100" height="50"/>
      <p style="margin: -16px 0 -3px; font-size:23px; ">camagru</p>
		</div>
  </a>
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
  <h3 style =  "font-size: 1.5em; margin-bottom: 10px;"> 
    <?php
      $u = $_SESSION['username'] ;
    ?> <?=  "{$u}"?>
  </h3>
</div>
<div class="profile-stats">
  <ul>
    <li><span class="profile-stat-count">Upload or take a picture and share it with everyone</span> <br>Add a filter to have some fun with the pictures</li>
	</ul>
</div>
</div>
<div class="layout">  
  <div class="row">
  <div class="center">
  <form action="functions\UploadFromPC.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" class="btn profile-edit-btn">
    <input type="submit" name="submit" class="btn profile-edit-btn" style="margin-bottom:10px;"  value="upload file"/>
  </form>
  </div>
  <div class="cell">
  <form method="POST">
    <video id="video" width="640" height="480" autoplay="true"></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <input type="hidden" name="image" id="img">
    <canvas id="canvas2" width="640" height="480"></canvas>
    <button type="Submit" class="btn profile-edit-btn" name="delete">Reset</button>
    <a class="btn profile-edit-btn" style="margin-bottom:10px;"  id="snap">Take A Picture</a>
    <button type="Submit" name="upload" class="btn profile-edit-btn" style="margin-bottom:10px;">Upload</a>
  </form>
    </div>
    <div class="cell">
    <div class="slideshow-container">
 <h1 style="font-size:1.8em;">Select A Sticker To Add</h1>
<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <button class="sticker-button" onclick="add_stickers(0);"><img class="stickers" style="width:70%" src="Stickers/01.png"></button>

</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <button class="sticker-button" onclick="add_stickers(1);"><img class="stickers" style="width:70%" src="Stickers/02.png"></button>

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <button class="sticker-button" onclick="add_stickers(2);"><img class="stickers" style="width:70%" src="Stickers/04.png"></button>


</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <button class="sticker-button" onclick="add_stickers(3);"><img class="stickers" style="width:70%" src="Stickers/05.png"></button>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <button class="sticker-button" onclick="add_stickers(4);"><img class="stickers" style="width:70%" src="Stickers/06.png"></button>
</div>


<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>

<script>

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
    
    </div>
    </div>

   
  </div>
</div>
  <script>
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var canvas2 = document.getElementById('canvas2');
    var context2 = canvas2.getContext('2d');
    var stickers = document.querySelectorAll( '.stickers' );
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
      navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
      {
          video.srcObject = stream;
      });
    }
    var stickers = new Array;
    stickers[0] = "Stickers/01.png";
    stickers[1] =  "Stickers/02.png";
    stickers[2] =  "Stickers/04.png";
    stickers[3] =  "Stickers/05.png";
    stickers[4] =  "Stickers/06.png";

    function  add_stickers(e)
    {
        var image = new Image();
        image.src = stickers[e];
        context.drawImage(image,400,300,160,160);
    }

    document.getElementById("snap").addEventListener("click", function() {
      context2.drawImage(video, 0, 0, 640, 480);
        context2.drawImage(canvas, 0, 0, 640, 480);
        document.getElementById("img").value = canvas2.toDataURL();
    });
  </script>
</body>
</html>

<?php
 if (isset($_POST['upload']))
 {
   if(isset($_POST['image']))
   {
      $img = $_POST['image'];
      $servername = "localhost";
      $dusername = "root";
      $password = "";
      $dbname = "Camagru_rnyakuti";
      $id = $_SESSION['id'];
      try
      {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "INSERT INTO images (user_id, image_name, likes) VALUES ('$id', '$img', 0)";
        $conn->exec($str);
        echo "photo taken, view it in the gallery";
      }
      catch(PDOException $e)
      {
        echo "[INFO] " . $e->getMessage();
      }
   }
  
 }

?>