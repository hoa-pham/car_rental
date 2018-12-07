<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<h1>Home page</h1>
	<?php $id = $_GET['user']; ?>
	<a href='profile.php?userid=<?php echo $id ?>'>Profile</a>
</body>
</html>