<?php
// Start the session
session_start();
?>

<?php
$DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "Camagru_rnyakuti";

$username_new = $_POST['username_new'];
$email_new = $_POST['email_new'];
$password_current = $_POST['password-current'];
$password_new = $_POST['password_new'];
$password_newc = $_POST['password_newc'];
/*
try
{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $reg = "INSERT INTO users (fullname, username, email,password,verified) VALUES ('$fullname', '$username', '$email', '$hash','yes')";
    $request = $conn->query($reg);

    /**SEND CONFIRMATION MESSAGE */
 /*   $subject = "Camagru Registration Verification";
    $message = "Your account has been verified";
    mail($email, $subject, $message);
    echo "Confirmation email sent to ".$email."<br>";
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;*/
?>

<?= '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O "> A verification email has been sent to your inbox.  <a href="../../index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Go to login page</span></a></p></div></h4>' ?> 