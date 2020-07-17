<?php
include("config.php");

try 
{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
    echo "[INFO] Connection successful<br>";
}
catch(PDOException $e)
{
    echo "[INFO] " . $e->getMessage() . "<br>";
}

try
{
    $sql = "CREATE DATABASE $DB_NAME";
    $conn->exec($sql);
    echo "[INFO] Camagru database has been created successfully <br>";
}
catch(PDOException $e)
{
    echo "[INFO] Could not create database, details may be incorrect" . $e->getMessage() . "<br>";
}

/* Creating tables */
try
{
    $conn = new PDO("$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $users = "CREATE TABLE IF NOT EXISTS users(
        user_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
        fullname TEXT NOT NULL, username TEXT NOT NULL,
        email TEXT NOT NULL, password TEXT NOT NULL, verified TEXT NOT NULL, notifications TEXT NOT NULL)";
    $conn->exec($users);
    echo "[INFO]Users Table created successfully <br>";

    $image_uploads = "CREATE TABLE IF NOT EXISTS images (  
        image_id int(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        user_id INT(100) UNSIGNED NOT NULL,
        image_name longtext NOT NULL,
        likes int(200) NOT NULL)
        ENGINE=InnoDB DEFAULT CHARSET=latin1";

    echo "[INFO]Image_Uploads Table created successfully <br>";
    $conn->exec($image_uploads);
}
catch(PDOException $e)
{
    echo "[INFO] " . $e->getMessage();
}


?>

