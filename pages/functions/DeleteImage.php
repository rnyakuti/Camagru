<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
  <meta charset="UTF-8">
  <title>camagru [rnyakuti]</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../../styles/home.css">
<body>
<div class="header">
  <a href="#default" class="logo"><div class="logos">
				<img src="../../images/3069185.svg" alt="fish" style="margin-top:-25px; background-position: center;  background-repeat: no-repeat; " width="100" height="50">
        <p style="margin: -16px 0 -3px; font-size:23px; ">camagru</p>
			</div></a>
  <div class="header-right">
    <a href="../../index.php" style=" font-size:1.2em">LOGIN</a>
	<a href="../Home.php" style=" font-size:1.2em">MY PROFILE</a>
    <a href="../signUpPage.php" style=" font-size:1.2em">SIGNUP</a>
  </div>
</div>
    <div class="container" style="min-height: 100vh;">
 
       
				 
	 <?php

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
    $id = $_GET['img'];
    $res = $conn->query($str);
    echo '<form method="post">';
    echo "<button  type='submit' name='delete' class='btn profile-edit-btn' style='margin-bottom:10px; margin-left:10px; margin-top:10px'>Delete Image</button>";
    echo '</form>';
    while ($new = $res->fetch())
	{
        $img = "<img  src=\"".$new['image_name']."\" class='gallery-image'>";
        if($id == $new['image_id'])
        {
            echo $img;
        }
        
    }
    echo "<br>";
    echo "<h1 style='font-size: 20px; text-align:center; margin-top: 20px;margin-bottom: 20px; color: #eb5234'>***IMAGE WILL BE PERMANENTLY DELETED SO BE VERY SURE AS THERE IS NO WAY TO RETREIVE IT AFTER DELETING***</h1>";

    if(isset($_POST['delete']))
    {
        $del = "DELETE FROM images WHERE image_id=$id";
        $conn->exec($del);
       echo "Image deleted from database. last chance to save it to your pc or phone. If you click delete again or refresh this page, it will be gone for good";
    }
}
catch(PDOException $e)
	{
		echo "[INFO] " . $e->getMessage();
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