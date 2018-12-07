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

         //Retrieve inputs (using helper function)
         $email = htmlspecialchars($_POST['email']);
         $password = $_POST['password'];
         
         //set validation flag
         $IsValid = true;

         echo "<p class='centeredNotice'>";
         //check email validation
         if (!fIsValidEmail($email)) {
            echo "Invalid email<br>";
            $IsValid = false;
         }

         if($IsValid) {
            // echo $email . "   " .$password ."<br>";
            //dont use .$email. the right way to use is '$email'
            $emailQuery = "select * from users where userName='$email'";
            $passQuery = "select * from users where pass='$password'";
            // echo getOne($conn,$query,$email);
            if(getOne($conn,$emailQuery,$email)=="Error:" || getOne($conn,$passQuery,$password)=="Error:"){
               echo "You need to register or re-enter your email and password!";
            }
            else{
               echo "you passed!";
               // do whatever here!
               header('Location: '.'home.php');
            }

         }
         else echo "Please check your email and password";
         

         $conn->close();
         ?>
      </div>
   </body>
</html>
