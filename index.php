<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>camagru [rnyakuti]</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='styles/bootstrap.min.css'>
<link rel="stylesheet" href="styles/style.css">

</head>
<body>
<body class="login">
	<div class="container">
		<div class="login-container-wrapper clearfix">
			<div class="logo">
				<img src="images/3069185.svg" alt="fish" style="margin-top:-9px;" width="80" height="80">
        <p style="margin: -16px 0 -3px;">camagru</p>
			</div>
			<div class="welcome"><strong>Welcome,</strong> please login</div>

			<form class="form-horizontal login-form" action="validate_login.php" id="#form" method="post" >
				<div class="form-group relative">
					<input name="username" class="form-control input-lg" type="text" placeholder="Username" required>
					<i class="fa fa-user"><img src="images/898118.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
				<div class="form-group relative password">
					<input name="password" class="form-control input-lg" type="password" placeholder="Password" required>
					<i class="fa fa-lock"><img src="images/165002.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
			  <div class="form-group">
			    <button type="submit" class="btn btn-success btn-lg btn-block" name="submit" value='Submit'>Login

				</button>
			  </div>
			  <div class="text-center">
			    <a class=" text-center" href="pages/forgotPasswordPage.php" title="forget" style="color:yellow;">Forgot password</a> 
			  </div>
			</form>
		</div>
  
    <h4 class="text-center">
      <div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv         "><p class="izU2O ">Don't have an account? <a href="pages/signUpPage.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk        ">Sign up</span></a></p></div>
    </h4>
	<h4 class="text-center">
      <div class="_7UhW9   xLCgt     yUEEX    _0PwGv        uL8Hv         "><p class="izU2O ">Don't want to login? <a href="pages/PhotoGalleryPage.php"><span class="_7UhW9   xLCgt       qyrsm      gtFbE     se6yk        ">view photo gallery</span></a></p></div>
    </h4>
	</div>

  </body>
</body>
</html>

