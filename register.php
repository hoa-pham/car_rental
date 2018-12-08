<?php
	include 'server.php';
	include 'validationUtilities.php';
	//Retrieve inputs (using helper function)
	$email = $_POST['email'];
	$password =$_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];

    //echo "<br>" .$email ."<br>" .$password ."<br>" .$firstName ."<br>" .$lastName ."<br>" .$birthDate;

    //validation data
    $isValid = false;
    if(fIsValidEmail($email)){
    	if(!isExist($conn,$email)){
    		$isValid = true;
    		echo "<script>console.log('Validation passed')</script>";
    	}
    	else echo "<h2>email is existed! Please chose another!</h2>";
    }
	else echo "<h2>not validation!</h2>";
	header("location:home.php");


    //if passed validation
    if($isValid){
    	$queryUsers = "insert ignore into users value (null,'$email', '$password')";
    	$queryCustomerInfo = "insert ignore into customerInfo value (null,'$firstName', '$lastName', '$birthDate')";
    	if(insert($conn,$queryUsers) && insert($conn,$queryCustomerInfo)) {
    		echo "<h2>Thank you! Welcome to the Best service Rental Car!</h2>";
    		
    	}
    }

?>
