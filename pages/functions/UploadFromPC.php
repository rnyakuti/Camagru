<?php
    session_start();
    if(!isset( $_SESSION['id']))
{
	header("Location: ../index.php");
}
    echo"uploading ....";

    $servername = "localhost";
    $dusername = "root";
    $password = "";
    $dbname = "Camagru_rnyakuti";
    $name = "";
if(isset($_POST['submit'])){
 
    $name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
   
      // Convert to base64 
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
      $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
      // Insert record
      try
      {
          $userID = $_SESSION['id'];
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $str = "INSERT INTO images (user_id, image_name, likes) VALUES ('$userID', '$image', 0)";
          $conn->exec($str);
      }
      catch(PDOException $e)
      {
          echo "[INFO] " . $e->getMessage();
      }
    
      // Upload file
      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
      header("Location: ../Home.php");
    }
   
  }
  echo "uploaded";
  $conn = null;
?>



