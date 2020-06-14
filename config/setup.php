<?php
$DB_DSN = "mysql:host=localhost";
$DB_USER = "root";
$DB_PASSWORD = "root";
$DB_NAME = "Camagru_rnyakuti";

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
        email TEXT NOT NULL, password TEXT NOT NULL, verified TEXT NOT NULL)";
    $conn->exec($users);
    echo "[INFO]Users Table created successfully <br>";
}
catch(PDOException $e)
{
    echo "[INFO] " . $e->getMessage();
}


?>

