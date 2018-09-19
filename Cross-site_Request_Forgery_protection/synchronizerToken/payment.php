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
		$.ajax({
            type: "GET",
            url: 'csrf_token_generate.php',
            success: function (output) {
                $('#csrf_token').val(output);                  
            }
        });
	});
	</script>
	<title>Cross-site Request Forgery protection with Synchronizer Token Pattern</title>
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