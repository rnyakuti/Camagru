<?php
    session_start();
    $key = $_GET['key'];
    $dusername = "root";
    $password = "";
    $DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
    
    if(password_verify($_SESSION['email'], $key))
    {
        $username = $_SESSION['username'];
        try
        {
            $conn = new PDO($DB_DSN, $dusername, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $verify = "SELECT username, user_id FROM users";
            $request = $conn->query($verify);
            while ($ser = $request->fetch())
            {
                if ($ser['username'] == $username)
                {
                    $id = $ser['user_id'];
                }
            }
            $update = "UPDATE users SET verified='yes' WHERE user_id=$id";
            if ($conn->query($update))
            {
                echo '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O ">Your account is now verified, you may log in and start uploading your pictures <a href="index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Go to login page</span></a></p></div></h4>';
            }
            
         //   header("Location: index.php");
        }
        catch (PDOException $e)
        {
            echo "Connect Failure: " . $e->getMessage();
        }
    }
    $conn = null;
?>