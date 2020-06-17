<?php
session_start();
?>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL*/
$email = $_POST['email_reset'];
// send email
mail($email,"test","testemail");
?>
<?= '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O "> If your account exist, a reset password will be in your inbox  <a href="../../index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Go to login page</span></a></p></div></h4>' ?> 