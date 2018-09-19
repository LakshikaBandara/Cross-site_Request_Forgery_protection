<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Cross-site Request Forgery protection with Double Submit Cookie</title>
</head>
<body id="LoginForm">
	<div class="container">
		<div class="login-form">
			<div class="main-div">
				<div class="panel">
   					<h1>User Login</h1>
   					<img src="icon.png">
   					
   				</div>
				<form method="POST" action="payment.php">
					<div class="row">
					<div class="form-group">
						<input type="text" name="uname" class="form-control" placeholder="Username" required value="ABC" style="background-color: #f2f5f2">
					</div>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required value="ABC123" style="background-color: #f2f5f2">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					<label>
      					<input type="checkbox" checked="checked" name="remember"> Remember me
    				</label>
    				
				</form>
			</div>
		</div>
	</div>
</body>
</html>