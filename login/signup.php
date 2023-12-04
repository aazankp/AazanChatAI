<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIGNUP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
			<div class="wrap-login100" style="width: 680px;">
				<form class="login100-form validate-form" id="signupdata" method="POST">
					<span class="login100-form-title p-b-26 mb-3">
						SIGNUP
					</span>

                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="file" name="profile" style="height: 45px; margin-bottom: 35px;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Enter Full Name">
                                <input class="input100" type="text" name="name">
                                <span class="focus-input100" data-placeholder="Full Name"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Valid email is: abc@gmail.com">
                                <input class="input100" type="email" name="email">
                                <span class="focus-input100" data-placeholder="Email"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Enter Password">
                                <span class="btn-show-pass">
                                    <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="password">
                                <span class="focus-input100" data-placeholder="Password"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Enter Confirm Password">
                                <span class="btn-show-pass">
                                    <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="confirm_password">
                                <span class="focus-input100" data-placeholder="Confirm Password"></span>
                            </div>
                        </div>
                    </div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn" name="signup">
								Signup
							</button>
						</div>
                    </div>
				</form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.all.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../assets/js/Custom.js"></script>
    </body>

</body>
</html>