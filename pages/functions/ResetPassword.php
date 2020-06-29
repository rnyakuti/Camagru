<?php
session_start();
?>
<?php
$DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
$dusername = "root";
$password = "";
$email = $_SESSION['email'];

try
{
    $conn = new PDO($DB_DSN, $dusername, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $qry = "SELECT username, email FROM users";
    $res = $conn->query($qry);
    $searchfound = 0;
    while ($new = $res->fetch())
    {
        if ($new['email'] == $email)
        {
            $email = $new['email'];
            $username = $new['username'];
            $searchfound = 1;
        }
    }
    if($searchfound == 1)
    {
        //generating key code
        $str_result = '0123456789ABCDEFGHIJK4LM9NOP3QRST5UVW2XY0Zab1cdefghijklmnopqr6stu7vwx8yz'; 
        $alphanum = substr(str_shuffle($str_result),  0, 8);

        $resetlink = "http://localhost/Camagru/setNewPassword.php";
        $subject = "Camagru forgot password reset";
        $message = "Please click the  following link and enter this code to reset create a new password for your account: " . $alphanum . "\n" . $resetlink;
        $headers = "From: noreply@camagru.com";
        $_SESSION['code'] = $alphanum;
        //message is sent to user inbox if their account exist
        $_SESSION['username'] = $username;
        mail ($email, $subject, $message, $headers);
    }
    echo "If your account exist a email will be sent to " . $email . "<br>";
}
catch(PDOException $e)
{
    echo "Connection failure " . $e->getMessage();
}
?>
<?= '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O "><a href="../../index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Go to login page</span></a></p></div></h4>' ?> 