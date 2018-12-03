<!DOCTYPE html>
<html>
   <head>
      <title>Validation Confirm</title>
   </head>
   <body>
      <div class="pageContainer centerText">
         <?php
         include 'validationUtilities.php';
         include 'server.php';

         //create DB connection
         $conn = new mysqli($servername, $username, $password, $DB);

         //Retrieve inputs (using helper function)
         $email = $_POST['email'];
         //Register inputs
         $password = $_POST['password'];
         $fName = $_POST['firstName'];
         $lName = $_POST['lastName'];
         $birthDate = $_POST['birthDate'];
         $pass = $_POST['password'];
         $confPass = $_POST['confirmPass'];         
         $birthDate = $_POST['birthDate'];         
         //$query = "select * from users where userName=" .$email;
         
         //$tempPass = getOne($conn,"");
         //echo "";

         //set validation flag
         $IsValid = true;

         echo "<p class='centeredNotice'>";
         if (isExist($conn, $email)) {
            echo "Your user name have been used, please select an other one<br>";
            $IsValid = false; 
         }
         if (!fIsValidDate($birthDate)) {
             echo "Birth Date is invalid<br>";
             $IsValid = false;
        }
         //check if password and confirm password is match
         if (!isMatch($pass, $confPass)) {
             echo "Password does not match<br>";
             $IsValid = false;
         }
         //email
         if (!fIsValidEmail($email)) {
            echo "Invalid email<br>";
            $IsValid = false;
         }
         //check length of input        
         if (!fIsValidLength($fName, 2, 20)) {
            echo "Enter first name (2-20 characters)<br>";
            $IsValid = false;
         }
         if (!fIsValidLength($lName, 2, 20)) {
            echo "Enter last name (2-20 characters)<br>";
            $IsValid = false;
         }
         if (!fIsValidLength($pass, 10, 20)) {
            echo "Enter password (10-20 characters)<br>";
            $IsValid = false;
         }

         // if (!fIsValidPhone($phone)) {
         //    echo "Enter 10 digit phone number<br>";
         //    $IsValid = false;
         // }

         //if (!fIsValidStateAbbr($state)) {
         //   echo "Enter 2-character state abbreviation<br>";
         //   $IsValid = false;
         //}

         echo "</p>";
         if (!$IsValid) {
            //at least one element not valid. Echo a message and stop execution
            echo "<img class='validImage' src='/sandvig/mis314/images/red_x.jpg' /><br><br>
            <p><input type='button' class='button' value='<< Go Back <<' onClick='history.back()'><br></p>";
            //stop execution. 
            exit();
         }
         //all inputs are valid.
         else{
	        //insert($conn,"insert into cars value ('22222237000', 'truck', 'black red', 2019,'Honda')");
            insert($conn, "insert into users value('$email', '$pass')");
            insert($conn, "insert into customerInfo value('$email', '$fName', '$lName', '$birthDate')");
            echo "<div class='center'>
            <img class='validImage' src='/sandvig/mis314/images/valid.png' />
            <h3>All inputs have valid formats!</h3>
            Email: $email <br>
            First name: $fName <br>
            Last name: $lName <br>
            Birth Day: $birthDate <br>
            ";
         }
            
         ?>
      </div>
   </body>
</html>
