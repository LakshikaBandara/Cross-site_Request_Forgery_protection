<?php

	if(isset($_POST['uname']) && isset($_POST['password']))
	{
		$uname=$_POST['uname'];
		$password=$_POST['password'];

		if (($uname=='ABC') && ($password=='ABC123'))
		{
			echo '<script language="javascript">';
			echo 'alert("USER LOGIN SUCCESSFUL.")';
			echo '</script>';
			session_start();
			$csrf_token_value = base64_encode(openssl_random_pseudo_bytes(32));
			$_SESSION['csrf_token'] = $csrf_token_value;
			$session_id = session_id();
			setcookie('session_cookie',$session_id,time()+60*60*24*30,'/');
			setcookie('csrf_cookie',$_SESSION['csrf_token'],time()+60*60*24*30,'/');
		}

		else
		{
			echo '<script language="javascript">';
			echo 'alert("INVALID LOGIN. PLEASE TRY AGAIN.")';
			echo '</script>';
			exit();
		}

	}

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function()
	{
		var name = "csrf_cookie=";
		var cookie_value = "";
		var decoded_cookie = decodeURIComponent(document.cookie);
		var d = decoded_cookie.split(';');
		for(var i = 0; i <d.length; i++) 
		{
			var c = d[i];
			while (c.charAt(0) == ' ') 
			{
				c = c.substring(1);
				
			}
			if (c.indexOf(name) == 0) 
			{
				cookie_value = c.substring(name.length, c.length);
				document.getElementById("csrf_token").setAttribute('value', cookie_value);
			}
		}
	});
	</script>
	<title>Cross-site Request Forgery protection with Double Submit Cookie</title>
</head>
<body>
<div class="container">
	<div class="login-form">
		<div class="main-div">
			<div class="panel">
   				<h1>Payment Information</h1>   					
   			</div>			
			<form method="POST" action="confirmation.php">
				<div class="row">
				<div class="form-group">
					<label style="text-align: left">Full Name:   </label>
					<input type="text" name="fname" class="form-control" placeholder="Full Name" required style="background-color: #f2f5f2">
				</div>
				</div>
				<div class="form-group">
					<label style="text-align: left">Bank Name:   </label>
					<input type="text" name="bank" class="form-control" placeholder="Bank Name" required  style="background-color: #f2f5f2">
				</div>
				<div class="form-group">
					<label style="text-align: left">Account No. :</label>
					<input type="text" name="accNo" class="form-control" placeholder="Account No." required  style="background-color: #f2f5f2">
				</div>
				<div class="form-group">
					<label style="text-align: left">Branch:      </label>
					<input type="text" name="branch" class="form-control" placeholder="Branch" required  style="background-color: #f2f5f2">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>				
    			<input type="hidden" name="csrf_token" value="" id="csrf_token"/>	
			</form>
		</div>		
	</div>
  </form>
</div>
</body>
</html>