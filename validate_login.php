<?php
// Start the session
session_start();
?>


<?php

$DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "Camagru_rnyakuti";
$username = $_POST['username'];
$password_1 = $_POST['password'];

try
{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sel = "SELECT user_id, username, password, verified FROM users";
    $res = $conn->query($sel);
    while ($new = $res->fetch())
    {
        if ($new['username'] == $username)
        {
             $user = $new['username'];
             $pw = $new['password'];
             $ver = $new['verified'];
             $id = $new['user_id'];
        }
    }
    if ($ver == 'yes')
    {
       if (password_verify($password_1, $pw) == TRUE)
       {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = "yes";
            $_SESSION['id'] = $id;
            header("Location: pages/Home.php");
        }
        else
        {
            echo "username or password invalid. check your details or register if you dont have an accout";
        }
    }
    else
    {
        echo "It seems as though you are not a verified user, please check your inbox to complete account verification";
    }
}
catch (PDOException $e)
{
    echo "Connect Failure: " . $e->getMessage();
}
     
 $conn = null;
?>


?>