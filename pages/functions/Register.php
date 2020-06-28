<?php
// Start the session
session_start();
?>

<?php
$DB_DSN = "mysql:host=localhost;dbname=Camagru_rnyakuti";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "Camagru_rnyakuti";


if(isset($_POST['set_reg']))
{
    //field empty validation is handled by html, email has to follow a certain parttern as well
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['regconfirm_password'];

    try
    {
        //Connecting to DB 
        $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //check if username exist in DB
        $search = "SELECT * FROM users";
        $ser=$conn->query($search);
        $variable_match = 0;
        while($fetch = $ser->fetch())
        {
            if($fetch['username'] == $username)
            {
                $variable_match = 1;
                echo "The username ".$username." already exist and is not available, please try another username <br>";
                break;
            }
            if($fetch['email'] == $email)
            {
                $variable_match = 1;
                echo "The  email ".$email." is already registered to another account, please use a differerent email <br>";
            }
        }

        //check if password fields match
        if(strcmp($password, $confirmPassword)== 0)
        {
             //check the strength
            if(preg_match('@[A-Z]@', $password) && preg_match('@[a-z]@', $password) && preg_match('@[0-8]@', $password) && preg_match('@[^\w]@', $password) )
            {
                //hash password to store in database
                $hash = trim(password_hash($password, PASSWORD_BCRYPT));
                $hash= trim($hash);
                //inserting user into Database
               if($variable_match == 0)
               {
                    $reg = "INSERT INTO users (fullname, username, email,password,verified) VALUES ('$fullname', '$username', '$email', '$hash','yes')";
                    $request = $conn->query($reg);
        
                    /**SEND CONFIRMATION MESSAGE */
                    $subject = "Camagru Registration Verification";
                    $message = "Your account has been verified";
                    mail($email, $subject, $message);
                    echo "Confirmation email sent to ".$email."<br>";
                    echo '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O "> A verification email has been sent to your inbox.  <a href="../../index.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk">Go to login page</span></a></p></div></h4>';
               }
            }
            else
            {
                echo 'Your password is too weak. It should be at least 7 characters in length, have at least one upper case letter one number, and one special character. <br>';
            }
        }
        else
        {
            echo "The Passwords entered do not match <br>";
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
   
}
$conn = null;
?>