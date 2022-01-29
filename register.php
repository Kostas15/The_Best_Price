<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration system PHP and MySQL</title>
  <style>
	* {
		margin: 0px;
		padding: 0px;
		text-decoration: none;
	}
	body {
		font-size: 120%;
		background: #F8F8FF;
	} 
	nav{
		height: 80px;
		width: 100%;
		background-color: #5F9EA0;
		;

	}
	label.logo{
		font-family: 'Times New Roman', Times, serif;
		font-size: 35px;
		font-weight: bold;
		color: white;
		padding: 0px 200px;
		line-height: 80px;
	} 
	.header {
		width: 25%;
		margin: 50px auto 0px;
		color: white;
		background: #5F9EA0;
		text-align: center;
		border: 1px solid #B0C4DE;
		border-bottom: none;
		border-radius: 10px 10px 0px 0px;
		padding: 20px;
		text-align: center;
	}
	form, .content {
		width: 25%;
		margin: 0px auto;
		padding: 20px;
		border: 1px solid #B0C4DE;
		background: white;
		border-radius: 0px 0px 10px 10px;
	}
	.input-group {
		margin: 10px 0px 10px 0px;
	}
	.input-group label {
		display: block;
		text-align: left;
		margin: 3px;
	}
	.input-group input {
		height: 30px;
		width: 93%;
		padding: 5px 10px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid gray;
	}
	.btn {
		padding: 10px;
		font-size: 15px;
		color: white;
		background: #5F9EA0;
		border: none;
		border-radius: 5px;
	}
	#btn-back{
		padding: 10px;
		font-size: 15px;
		color: white;
		background: #5F9EA0;
		border: none;
		border-radius: 5px;
	}
	.error {
		width: 92%; 
		margin: 0px auto; 
		padding: 10px; 
		border: 1px solid #a94442; 
		color: #a94442; 
		background: #f2dede; 
		border-radius: 5px; 
		text-align: left;
	}
	.success {
		color: #3c763d; 
		background: #dff0d8; 
		border: 1px solid #3c763d;
		margin-bottom: 20px;
	}
	@media (max-width: 1000px){
		
		.header {
			width: 30%;
			margin: 50px auto 0px;
			padding: 20px;
			font-size: 15px;
		}
		form, .content {
			width: 30%;
			font-size: 15px;
		}
	}
	@media (max-width: 650px){
		.logo{
            font-size: 35px;
            padding: 0px 100px;
        }
		.header {
			width: 55%;
			margin: 50px auto 0px;
			padding: 20px;
			font-size: 15px;
		}
		form, .content {
			width: 55%;
			font-size: 15px;
		}
	}
  </style>
</head>
<body>
<nav>
	<label class="logo">The Best Price</label>
  	</nav>
	<div class="header">
		<h2>Register</h2>
	</div>
	
  	<form method="post" action="register.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
		</div>
		<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
		</div>
		<div class="input-group">
		<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>