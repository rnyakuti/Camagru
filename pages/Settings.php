<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>camagru [rnyakuti]</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='../styles/bootstrap.min.css'>
<link rel="stylesheet" href="../styles/style.css">

</head>
<body>
<div class="header">
  <a href="#default" class="logo"><div class="logos">
				<img src="../images/3069185.svg" alt="fish" style=" background-position: center;  background-repeat: no-repeat; " width="100" height="50">
        <p style="margin: -16px 16px -3px; font-size:1.2em; ">camagru</p>
			</div></a>
  <div style="float:right; margin-right:10px; margin-top:-30px;">
    <a href="Home.php" style=" font-size:1em;">MY PROFILE</a>
    <a href="PhotoGalleryPage.php" style=" font-size:1em; margin-left:10px;">EXPLORE</a>
    <a href="functions/logOut.php" style=" font-size:1em; margin-left:10px;">LOGOUT</a>
	
  </div>
</div>
<body class="login">
	<div class="container">
		<div class="login-container-wrapper clearfix" style="  margin-top: 40px !important;">
			<div class="welcome"><strong>Here you can edit your account details.</strong> Click confirm to save changes and leave blank the details you do not want to change</div>

			<form class="form-horizontal login-form" action="functions\UpdateDetails.php" method="post">
				<div class="form-group relative">
					<input name="username_new" class="form-control input-lg" type="text" placeholder="new username"/>
                <i class="fa fa-user"><img src="../images/898118.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
				<div class="form-group relative">
					<input name="email_new" class="form-control input-lg" type="email" placeholder="new email address"/>
					<i class="fa fa-user"><img src="../images/916938.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
				<div class="welcome"><strong>To change your password you need to provide the current one</strong></div>
				<div class="form-group relative password">
					<input name="password_current" class="form-control input-lg" type="password" placeholder="current password"/>
					<i class="fa fa-lock"><img src="../images/165002.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
				<div class="form-group relative password">
					<input name="password_new" class="form-control input-lg" type="password" placeholder="new password"/>
					<i class="fa fa-lock"><img src="../images/165002.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
                <div class="form-group relative password">
					<input name="password_newc" class="form-control input-lg" type="password" placeholder="new password confirm"/>
					<i class="fa fa-lock"><img src="../images/165002.svg" alt="fish" style="margin-top:-9px; opacity:0.5" width="30" height="30"></i>
				</div>
				<div class="welcome">Receive notifications in your inbox from activity on your pictures</div>
				<div  class="form-group relative"> ​ <label style="color:white;">Notifications : </label>
  						<select id="option-not" name="notification">
    						<option value="yes">yes</option>
    						<option value="no">no</option>
  						</select>
  				</div>
			  <div class="form-group">
			    <button name="set_reg" type="submit" class="btn btn-success btn-lg btn-block">confirm</button>
			  </div>
			</form>
		</div>
	</div>
    <div style="background-color: black;; color: white; text-align: center;margin-bottom:-30px;height:80px; bottom:0;width:100%;" >
  <p style=" font-size: 15px;padding-top:30px;">rnyakuti &copy; </p>
</div>
  </body>
</body>
</html>