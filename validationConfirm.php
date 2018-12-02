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
         $password = $_POST['password'];
         $query = "select * from users where userName=" .$email;

         $tempPass = getOne($conn,"");
         //echo "";

         //set validation flag
         $IsValid = true;

         echo "<p class='centeredNotice'>";
         //email
         if (!fIsValidEmail($email)) {
            echo "Invalid email<br>";
            $IsValid = false;
         }
        
         if (!fIsValidLength($fname, 2, 20)) {
            echo "Enter first name (2-20 characters)<br>";
            $IsValid = false;
         }

         // if (!fIsValidPhone($phone)) {
         //    echo "Enter 10 digit phone number<br>";
         //    $IsValid = false;
         // }

         if (!fIsValidStateAbbr($state)) {
            echo "Enter 2-character state abbreviation<br>";
            $IsValid = false;
         }

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
            echo "<div class='center'>
            <img class='validImage' src='/sandvig/mis314/images/valid.png' />
            <h3>All inputs have valid formats!</h3>
            Email: $email <br>
            First name: $fname <br>
            State: $state <br>
            ";
         }
            
         ?>
      </div>
   </body>
</html>
