<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Login Page | Amaze UI Example</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
	<link rel="stylesheet" href="assets/css/amazeui.min.css"/>
	<style>
	.header {
		text-align: center;
	}
	.header h1 {
		font-size: 200%;
		color: #333;
		margin-top: 30px;
	}
	.header p {
		font-size: 14px;
	}
</style>
</head>
<body>
	<div class="header">
		<div class="am-g">
			<h1>Customer Register</h1>
			<br>
			<br>

		</div>

	</div>
	<div class="am-g">
		<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
			<h3>Provide your details to make register easier.</h3>
			<hr>
			<br>

	<form method="post" class="am-form" id="customer_register" name="customer_register" action="customer.php?action=customer_register">
		
		<label for="username">Username:</label>
		<input type="text" name="customer_username" id="customer_username" value="">
		<br>
		<label for="password">Password:</label>
		<input type="password" name="customer_password" id="customer_password" value="">
		<br>
		<label for="text">Name:</label>
		<input type="text" name="customer_name" id="customer_name" value="">
		<br>
		<label for="text">Address:</label>
		<input type="text" name="customer_address" id="customer_address" value="">
		<br>
		
		
		<br />
		<div class="am-cf">
			<input type="submit" id="customer_register" name="customer_register" value="Submit" class="am-btn am-btn-primary am-btn-sm am-fl">
			<a href="customer_login.php"><input type="button" id="turn_to_login" value="Have an account already?Click here to Login" class="am-btn am-btn-success am-btn-sm am-fl"></a>
		</div>


	</form>
	<hr>
	<p>© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
	</div>
	</div>
</body>
</html>