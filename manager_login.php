<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Register | Keep.com</title>
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
			<h1>Manager Login</h1>
			<br>
			<br>

		</div>

	</div>
	<div class="am-g">
		<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
			<h3>Enter your email and password to login</h3>
			<hr>
			<br>

			<form method="post" class="am-form" id="manager_login" name="manager_login" action="manager.php?action=manager_login">
				<label for="email">E-mail:</label>
				<input type="email" name="manager_email" id="manager_email" value="">
				<br>
				<label for="password">Password:</label>
				<input type="password" name="manager_password" id="manager_password" value="">
				<br>
				
				<br />
				<div class="am-cf">
					<input type="submit" id="manager_login" name="manager_login" value="Login" class="am-btn am-btn-primary am-btn-sm am-fl">
				</div>
			</form>
			
		</div>
	</div>
</body>
</html>

<?php 
	require_once "footer.php"
?>