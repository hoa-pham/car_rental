<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<!-- bootrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container text-center form">
		<legend>Sign In</legend>
		<form method="post" action="ValidationConfirm.php" autocomplete="on">

		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" class="form-control" name="email" id="email" placeholder="...@example.com">
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" id="password" placeholder="">
		  </div>
		  
		  <button class="btn btn-primary" type="submit">Login</button>

		  <div class="form-group register">
		  	<a href="register.html">Register</a>
		  </div>
		</form>


	</div>


	<!-- boostrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>

