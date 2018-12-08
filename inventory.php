<?php

session_start();
// Connect to database
include 'server.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
    /* .fakeimg {
      height: 200px;
      background: #aaa;
    } */
    </style>
  <!-- <link rel="stylesheet" type="text/css" href="home.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="register.php">New User ?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="#">Inventory</a>
          </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Youtube Video</a>
          </li>
          <li class="nav-item">
            <img class="checkOut" src="pics/homepics/cart.png" alt="cart" width="30" height="30">
          </li>
        </ul>
      </div>  
      </div>
    </nav> 
   <!-- Car Inventory will display across the screen -->
   
    <!-- <div class="container"> -->
    <!-- Display things to add into cart -->

          <!-- div 1  -->
         <div id="products" class="tab-conent"> 
       <?php
             // fetch everything from the cars table and store in result variable
             $query = "select * from cars";
             $result = mysqli_query($conn,$query) or die("Invalid query: " );
             // We are fetching everything from the cars table
             while($row = mysqli_fetch_array($result)){
            
         ?> 

          <div class="col-md-4" style="margin-top:12px;">

        

         <div style="border:10px solid #333; background-color:#f1f1f1;border-radius:50px; padding:16px; height:auto; align= center";>
                
                <img class= "img-responsive" src = "<?php echo $row['carPic']; ?>" style="padding:auto; margin-bottom:auto; border-spacing:100px 100px;;" /><br />

                <!-- name of the car -->
                <h1 class="dark-ink" style=""><?php echo $row['manufactor'];?></h1>
              
                  <!-- The type of the car -->
                <h1 class="text-info"><?php echo $row['carType'];?></h1>

               <!-- price of the car -->
                <h1 class="text-danger" style= "margin-top:20px;">$<?php echo $row['carPrice'];?> </h1>

                <!-- color -->
                <h1 class="text-title"><?php echo $row["color"]; ?></h1>
                
               
                <!-- the next line will store the prices -->
                <!-- <h1 class="text-title"><?php echo $row['carPrice'];?></h1> -->

                <button class="btn btn-warning form-control add_to_cart" style= "margin-top: 20px;" value="<?php echo $row["vinNum"];?>">Add to Cart</button>
            
        <!-- </form> -->
            </div>
        </div>
      </div>

        <?php
         
            }
        ?>
        <!-- end of div 1 -->
     </div> 
    <!-- </div> -->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="inventory.js"></script>
</body>
</html>
