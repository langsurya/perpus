<!DOCTYPE html>
<html>
<head>
	<title>LOGIN USER</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>

	<div class="container">
		<div id="loginbox" style="margin-top: 100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Sign In</div>
					<div style="float: right; font-size: 80%; position: relative; top: -10px"><a href="#">Forgot password</a></div>
				</div>

				<div style="padding-top: 30px" class="panel-body">
					<div style="display: none" id="login-alert" class="alert alert-danger col-sm-12"></div>
					<form id="loginform" class="form-horizontal" role="form" action="cek-login.php" method="POST">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="login-username" type="text" class="form-control" name="username" placeholder="username" required>
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
						</div>

						<div style="margin-top: 10px;" class="form-group">
							<div class="col-sm-12 controls">
								<button class="btn btn-lg btn-primary btn-block"  name="submit" value="Login" type="Submit">Login</button> 
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-12 control">
								<div style="border-top: 1px solid#888; padding-top: 15px; font-size: 85%">
									PHPOISON.BLOGSPOT.COM
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

</body>
</html>
