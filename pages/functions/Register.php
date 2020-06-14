<?php
// Start the session
session_start();
?>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL*/
$link = mysqli_connect("localhost", "root", "root", "Camagru_rnyakuti");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fullname = mysqli_real_escape_string($link, $_REQUEST['fullname']);
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo $out ."yeet";
 
// Attempt insert query execution
$sql = "INSERT INTO users (fullname, username, email,password,verified) VALUES ('$fullname', '$username', '$email', '$hashed_password ','yes')";
if(mysqli_query($link, $sql)){
    echo ($username . "User has been registered, Please check your email to complete verification.");
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>

<?= '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O "> Dont have an account? <a href="../../index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Sign up</span></a></p></div></h4>' ?> 