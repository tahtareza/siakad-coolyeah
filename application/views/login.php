
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIAKAD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets2/img/favicon.ico'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/font-awesome/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/linearicons-free/icon-font.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/vendor/daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets2/css/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url('assets2/img/bg-01.jpg'); ?>');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo base_url('C_login/aksi_login'); ?>" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/vendor/jquery/jquery.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets2/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/vendor/select2/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets2/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/vendor/countdowntime/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets2/js/main.js'); ?>"></script>

</body>
</html>