<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<?php include 'server.php';?>
</head>
<body>
	<div class="container text-center">
		<?php
			$userid = $_GET['userid'];
			$fname = getOne($conn,"select * from customerinfo where userId = $userid","fName");
			$lname = getOne($conn,"select * from customerinfo where userId = $userid","lName");
			$birthday = getOne($conn,"select * from customerinfo where userId = $userid","birthDay");
			$username = getOne($conn,"select * from users where userId = $userid","userName");
			$password = getOne($conn,"select * from users where userId = $userid","pass");
			$cardtype = getOne($conn,"select * from payment where userId = $userid","cardType");
		
			echo "
			Name: $fname $lname <br>
			Date of birth: $birthday <br>
			Username: $username <br>
			Pasword: $password <br>
			Payment Method: $cardtype
			";
		?>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>