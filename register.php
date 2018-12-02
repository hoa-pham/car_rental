<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
	<!-- bootrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container text-center form">
		<legend>Register</legend>
		<form method="post" action="validationConfirm.php" autocomplete="on">
		  <div class="form-group">
		    <label for="userName">User Name: </label>
		    <input type="text" class="form-control" name="userName" id="userName" placeholder="John Smith">
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" id="password" placeholder="">
		  </div>
		  <div class="form-group">
		    <label for="confirmPass">Password</label>
		    <input type="password" class="form-control" name="confirmPass" id="confirmPass" placeholder="">
		  </div>
		  <div class="form-group">
		    <label for="firstName">First Name: </label>
		    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="John">
		  </div>
		  <div class="form-group">
		    <label for="lastName">Last Name: </label>
		    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Smith">
		  </div>
            <!--
		  <div class="form-group">
		    <label for="birthDate">Birth Date: </label>
		    <input type="birthDate" class="form-control" name="birthDate" id="birthDate" placeholder="1995-01-01">
		  </div>
            -->
		  
		  <button class="btn btn-primary" type="submit">Register</button>

		</form>


	</div>


	<!-- boostrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
