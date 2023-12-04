<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="logindata" method="POST">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img src="../assets/images/logo.png" style="height:60px;" class="img-fluid">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div>
						<div class="row" style="margin-top: -19px; margin-bottom: 20px;">
							<div clas="col-md-2">
								<input class="form-control" style="margin-top: 5px; margin-left:10px;" type="checkbox" name="remember">
							</div>
							<div class="col-md-6">
								<p>Remember me</p>
							</div>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-50">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="signup.php">
							Sign Up
						</a>
					</div>
				</form>
				<div class="d-flex justify-content-center text-center mt-4 pt-1">
					<a href="#!"><i class="fab fa-facebook-f fa-lg"></i></a>
					<a href="#!"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
					<a href="#!"><i class="fab fa-google fa-lg"></i></a>
              </div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="../assets/js/Custom.js"></script>
    </body>

</body>
</html>