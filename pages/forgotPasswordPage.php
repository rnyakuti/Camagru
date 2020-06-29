<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>camaguru [rnyakuti]</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='../styles/bootstrap.min.css'>
<link rel="stylesheet" href="../styles/style.css">

</head>
<body>
<body class="login">
	<div class="container">
		<div class="login-container-wrapper clearfix" style="  margin-top: 100px !important;">
			<div class="logo">
				<img src="../images/3069185.svg" alt="fish" style="margin-top:-9px;" width="80" height="80">
        <p style="margin: -16px 0 -3px;">camaguru</p>
			</div>
			<div class="welcome"><strong>Forgot your password?</strong> Enter in your email and we will send you a reset password</div>

			<form class="form-horizontal login-form"  action="forgotPasswordPage.php" method="post">
				<div class="form-group relative">
					<input name="email_reset" class="form-control input-lg" type="email" placeholder="email address" required>
					<i class="fa fa-user"><img src="../images/916938.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
			  <div class="form-group">
			    <button type="submit" name="forgot-button" class="btn btn-success btn-lg btn-block">Send Email</button>
			  </div>
			</form>
		</div>
	</div>

  </body>
</body>
</html>
<?php 

session_start();
if(isset($_POST['forgot-button']))
{
	//email input validation by html
	if(empty($_POST['email_reset']))
	{
		echo '<h4 class= "text-center"><div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv  "><p class=" izU2O ">Email is required to be filled in for us to send you a reset link</p></div></h4>';
	}
	else
	{
		$_SESSION['email'] = $_POST['email_reset'];
		header("Location: functions/ResetPassword.php");
	}
	
}

?>