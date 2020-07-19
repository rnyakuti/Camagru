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
    <a href="LogOut.php" style=" font-size:1.2em">LOGOUT</a>
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
    $user = $_GET['user'];
    $likes = 0;
    echo "<h1 style='font-size: 20px; text-align:center; margin-top: 20px;margin-bottom: 20px;'> Uploaded by ".functionName($user)."</h1>";
    $res = $conn->query($str);
	while ($new = $res->fetch())
	{
        $img = "<img src=\"".$new['image_name']."\" class='gallery-image'>";
        if($id == $new['image_id'])
        {
            echo $img;
            $c_likes = $new['likes'];
        }
        
		
    }
    echo '<form method="post">';
    echo "<button  type='submit' name='like' class='btn profile-edit-btn' style='margin-bottom:10px; margin-left:10px; margin-top:10px'>Like</button>";
    echo  "<div><input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>";
    echo  "<textarea name='comment' style='float:left; width: 300px; height:100px;'></textarea><br> </div>";
    echo "<button type='submit' name= 'comment_submit' class='btn profile-edit-btn' style='margin-bottom:10px; margin-left:10px; margin-top:10px'>Comment</button>";
    echo '<form/>';
    echo '<h1 style="font-size: 15px; text-align:left; margin-top: 5px;font-weight: bold; color:#FA8072;">';
    echo  "LIKES : ".$c_likes;
    echo '</h1>';
    echo '<h1 style="font-size: 15px; text-align:left; margin-top: 30px;font-weight: bold; color:#FA8072;">Comments</h1>';
    echo  getComments($id);
    echo '<section style = "margin-bottom:100px;">';
    echo '</section>';

    if (isset($_POST['comment_submit']) && isset( $_SESSION['id']))
    {
        try
        {

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $str = "SELECT * FROM users";
            $res = $conn->query($str);
            $notifications = "";
            while ($new = $res->fetch())
            {
                if ($user == $new['user_id'])
                {
                    $email = $new['email'];
                    $notifications = $new['notifications'];
                }
            }
            if ($notifications == 'yes')
            {
                $subject = "You have a new comment on your post";
                $body = $_SESSION['username'] . " commented on one of your photos, go log in to view it :D. http://localhost:8080/camagru/index.php <--- log in with the link to view or disable notifications from coming into your inbox";
                $headers = "From: noreply@camagru.com";
                mail ($email, $subject, $body, $headers);
            }
            $date = $_POST['date'];
            $comment = $_POST['comment'];
            $user_id = $_SESSION['id'];
            $str = "INSERT INTO user_comments (image_id, user_id, date, comment) VALUES ('$id', '$user_id','$date','$comment' )";
            $conn->exec($str);
        }
        catch(PDOException $e)
        {
            echo "[INFO] " . $e->getMessage();
        }
    }

    if (isset($_POST['like']) && isset( $_SESSION['id']) )
    {
        try
        {

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $str = "SELECT * FROM images";
            $res = $conn->query($str);
            $likes= 0;
            while ($new = $res->fetch())
            {
                if ($id == $new['image_id'])
                {
                    $likes = $new['likes'];
                }
            }
            $likes++;
            $qry = "UPDATE images SET likes=$likes WHERE image_id=$id";
            $conn->exec($qry);
        }
        catch(PDOException $e)
        {
            echo "[INFO] " . $e->getMessage();
        }
    }
    
    

}
catch(PDOException $e)
	{
		echo "[INFO] " . $e->getMessage();
	}

	
function functionName($id) {
try
{
	$dusername = "root";
	$password = "";
	$DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
	$conn = new PDO($DB_DSN, $dusername, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$search = "SELECT username, user_id FROM users";
    $request  = $conn->query($search);
    $varbool = 0;
    while($searching = $request->fetch())
    {
        if($searching['user_id'] == $id)
        {
			$ret= $searching['username'];
           return $ret;
        }
     }
}

catch(PDOException $e)
	{
		echo "[INFO] " . $e->getMessage();
    }
}

function getComments($image_id)
{
   
    $servername = "localhost";
    $dusername = "root";
    $password = "";
    $dbname = "Camagru_rnyakuti";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$str = "SELECT * FROM user_comments";
	$res = $conn->query($str);
	while ($new = $res->fetch())
	{
		if($new['image_id'] == $image_id )
		{
            echo '<section style = "margin-bottom:40px;">';
            echo '<h1 style="font-size: 15px; text-align:left; margin-top: 10px;font-weight: bold;">comment by '.functionName($new["user_id"]).'</h1>';
            echo '<p style="font-size: 15px; text-align:left; margin-top: 10px;font-weight: lighter;" >'. $new["comment"].'</p>';
            echo '</section>';
		}	
	}

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