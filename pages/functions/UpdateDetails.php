<?php
session_start();
$DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
$DB_USER = "root";
$DB_PASSWORD = "";

try
{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION['id'];
    $session_username = $_SESSION['username'];
    $search = "SELECT * FROM users";
    $ser=$conn->query($search);
    $variable_match = 0;
    if(!empty($_POST['username_new']))
    {
        $username_new = $_POST['username_new'];
        while($fetch = $ser->fetch())
        {
            if($fetch['username'] == $username_new)
            {
                $variable_match = 1;
                echo "The username ".$username_new." already exist and is not available, please try another username <br>";
                break;
            }
        }
        if($variable_match == 0)
        {
            $update = "UPDATE users SET username='$username_new' WHERE user_id='$id' ";
            $conn->query($update);
            echo "username updated <br>";
        }
    }
    if(!empty($_POST['email_new']))
    {
        $variable_match = 0;
        $email_new = $_POST['email_new'];
        while($fetch = $ser->fetch())
        {
            if($fetch['email'] ==$email_new)
            {
                $variable_match = 1;
                echo "The email ".$email_new." already exist and is not available, please try another email <br>";
                break;
            }
        }
        if($variable_match == 0)
        {
            $updateemail = "UPDATE users SET email='$email_new' WHERE user_id='$id' ";
            $conn->query($updateemail);
            echo "email updated <br>";
        }
    }

    if(!empty($_POST['password_new']))
    {
       $sel = "SELECT username, password FROM users";
       $res = $conn->query($sel);
       $variable_match = 0;
       while ($search = $res->fetch())
       {
           if ($search['username'] == $session_username)
           {
                $pw = $search['password'];
                $variable_match = 1;
                break;
           }
       }
       $pw1 = $_POST['password_current'];
       if(empty($_POST['password_current']) || password_verify($pw1, $pw) == FALSE)
       {
           echo "in order to set a new password, you need to provide the current password.<br>";
       }
       else
       {
           if(empty($_POST['password_newc']))
           {
               echo "To change password you must provide a confirming password <br>";
           }
           else
           {
               $password_new = $_POST['password_new'];
               $password_newc = $_POST['password_newc'];
               if(strcmp($password_new, $password_newc) == 0)
               {
                    if(preg_match('@[A-Z]@', $password_new) && preg_match('@[a-z]@', $password_new) && preg_match('@[0-8]@', $password_new) && preg_match('@[^\w]@', $password_new) )
                    {
                        $hash = trim(password_hash($password_new, PASSWORD_BCRYPT));
                        $updatepass = "UPDATE users SET password='$hash' WHERE user_id='$id' ";
                        $conn->query($updatepass);
                        echo "password updated <br>";
                    }
                    else
                    {
                        echo "Your password is too weak. It should be at least 7 characters in length, have at least one upper case letter one number, and one special character. <br>";
                    }
               }
               else
               {
                   echo "Your new passwords do not match<br>";
               }
           }
       }
    }
    //update notifications option
    $pref = $_POST['notification'];
    $update = "UPDATE users SET  notifications='$pref' WHERE user_id='$id' ";
    $conn->query($update);
}
catch(PDOException $e)
{
    echo "Connection failure " . $e->getMessage();
}
session_unset();

// destroy the session
session_destroy(); 
?>
<?= '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O "> All the values you changed have been updated successfully  <a href="../../index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Go to login page</span></a></p></div></h4>' ?> 