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
				<img src="https://image.flaticon.com/icons/svg/3069/3069185.svg" alt="fish" style="margin-top:-9px;" width="80" height="80">
        <p style="margin: -16px 0 -3px;">camaguru</p>
			</div>
			<div class="welcome"><strong>Forgot your password?</strong> Enter in your email and we will send you a reset password</div>

			<form class="form-horizontal login-form"  action="functions\ResetPassword.php" method="post">
				<div class="form-group relative">
					<input name="email_reset" class="form-control input-lg" type="email" placeholder="email address" required>
					<i class="fa fa-user"><img src="https://image.flaticon.com/icons/svg/916/916938.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
			  <div class="form-group">
			    <button type="submit" class="btn btn-success btn-lg btn-block">Send Email</button>
			  </div>
			</form>
		</div>
	</div>

  </body>
</body>
</html>