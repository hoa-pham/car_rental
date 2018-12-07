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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="home.css">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
         <h1 align="center"> Car Inventory</h1></br>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">New User ?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="#">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://nba.com">Inventory</a>
      </li>
            <li class="nav-item">
    <a class="nav-link" href="#">Youtube Video</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="pics/homepics/cart.png" alt="cart" width="30" height="30"></a>
      </li>
    </ul>
  </div>  
</nav>

   <br />
   <!-- Car Inventory will display across the screen -->
   <div class = "container" style="width:1000px;">
     <button class="btn btn-lg btn-primary checkOut" >Check Out</button>

     <!-- Two tabs for cart. Nav tabs does this for us  -->
     <ul class = "nav nav-tabs">
     <!-- active defines current page in tab and data toggle is the specific tab
        href will show the Inventory and Cart
      -->
        <li class="active"><a data-toggle="tab" href="#products">Product</a></li>
     <!-- The condition will check the value of the shopping cart varialbe if its set or not
     It will then display whats in our shopping cart -->
        <li class="active">
            <a data-toggle="tab" href="#cart">Cart
                <span class="badge">
            <?php
                if(isset($_SESSION['shopping_cart']))
                {  
                //  This will show how many items in the cart 
                  echo count($_SESSION['shopping_cart']);
                }else{
                    // If theres nothing in the cart then print 0
                     echo '0';
                 }
             ?>
                </span>
            </a>
        </li>
    </ul>



    <div class="tab-content">
    <!-- Display things to add into cart -->
         <div id="products" class="tab-pane fade in active">
         <?php
             // fetch everything from the cars table and store in result variable
             $query = "select * from cars";
             $result = mysqli_query($conn,$query) or die("Invalid query: " );
             // We are fetching everything from the cars table
             while($row = mysqli_fetch_array($result)){
            
         ?>
         <div class = "col-md-4" style = "margin-top:12px;">
            <div style = "border:10px solid #333; background-color:#f1f1f1;border-radius:50px;
            padding:16px; height:auto;" align="center">
                <img src = "<?php echo $row['carPic']; ?>" class="img-responsive" style="padding:auto; margin-bottom:auto; border-spacing:100px 100px;;" /><br />

                <!-- name of the car -->
                <h4 class="text-info"><?php echo $row['manufactor'];?></h4>
                 
                  <!-- The type of the car -->
                <h4 class="text-info"><?php echo $row['carType'];?></h4>


               <!-- price of the car -->
                <h4 class = "text-danger" style="margin-top:20px;">$<?php echo $row['carPrice'];?> </h4>
                <!-- color -->
                <h4 class = "text-primary" style="margin-top:20px;"><?php echo $row["color"]; ?></h4>
                
               
                <!-- the next line will store the prices -->
                <h4 class = "text-primary" style="margin-top:20px;"><?php echo $row['carPrice'];?></h4>

                <button class="btn btn-warning form-control add_to_cart" style= "margin-top: 20px;" value="<?php echo $row["vinNum"];?>">Add to Cart</button>
            
        <!-- </form> -->
            </div>
        </div>

        <?php
         
            }
        ?>
     </div>
    </div>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="inventory.js"></script>
</body>
</html>
