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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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
     <!-- } -->
      <!-- ?></span> </a></li> -->
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

            <!-- we are printing the images from db to the screen -->
        <form method="post" action="action.php" autocomplete="on">
            <img src = "<?php echo $row['carPic']; ?>" class="img-responsive" style="padding:auto; margin-bottom:auto; border-spacing:100px 100px;;" /><br />

            <!-- name of the car -->
            <h4 class="text-info"><?php echo $row['manufactor'];?></h4>
             
              <!-- The type of the car -->
            <h4 class="text-info"><?php echo $row['carType'];?></h4>


           <!-- price of the car -->
            <h4 class = "text-danger" style="margin-top:20px;">$<?php echo $row['carPrice'];?> </h4>



            <!-- The amount of car you want to rent -->
            <!-- id quantity in jquery below
            Here we get the number of cars we want to rent and store into quantity -->
            <input type="text" name="quantity" value="number of car" id="quantity"<?php echo $row['vinNumber'];?>
    
       
            
             <input type = "hiden" name="hidden_name" id="name<?php echo $row["manufactor"];?>" value="<?php echo $row[""]; ?>" /> 
            <!-- the code above shows the type of the car in the box?
            I think i should change the id="name" to the name of the car. The name attribute
            is in the jquery also -->
           
            <!-- the next line will store the prices -->
            <input type="hidden" name="hidden_price" id="price <?php echo $row['carPrice'];?>" value="<?php echo $row['carPrice'];?>" />

            <!-- This line will be the button you click to add to the cart -->
            <!-- Each car is unique since the id for it is based on the vinNumber -->
            <!-- The Ajax for the add_to_cart is at the bottom -->
            <input type="submit" name="add_to_cart" id="<?php echo $row["vinNum"];?>" class="btn btn-warning form-control add_to_cart" style= "margin-top: 20px;" value="Add to Cart" /> 
        </form>
        </div>
    </div>

        <?php
         
            }
        ?>

    </div>

    <!-- We wanna display the shopping cart details here -->
     <div id = "cart" class="tab-pane fade">
     <!-- displays order details -->
        <div class="table-responsive" id="order_table">
            <table class="table table-bordered">
                <tr>
                    <th width = "40%"> Car Name</th>
                    <th width = "10%"> Quantity</th>
                    <th width = "20%"> Price</th>
                    <th width = "15%"> Total</th>
                    <th width = "5%"> Action</th>
                </tr>
                <?php 
                // if the shopping cart has nothing  in there
                if(!empty($_SESSION['shopping_cart'])){
                    // Displays total under shopping cart table
                    $total = 0;
                    // loop through SESSIOn shopping cart array
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                    {
                ?>
                        <tr>
                            <!-- Product name -->
                            <td> <?php echo $values['product_name']; ?> </td>
                            <!-- Product Quantity -->
                            <td> <?php echo $values['product_quantity']; ?> </td>
                            <!-- Product Price -->
                            <td align = "right"> <?php echo $values['product_price']; ?> </td>
                            <!-- Total Price of Cars -->
                            <td align = "right"> <?php echo number_format($values['product_quantity'] * $values['product_price']); ?> </td>
                            <!-- Remove Button  -->
                            <td><button name="delete" class="delete" id="<?php echo $values['product_id']; ?>">Remove</td>
                        </tr>

                        <?php
                            // This will show total of whole shopping cart product
                            $total = $total + ($values['product_quantity'] * $values['product_price']);
                    }
                        ?>

                  
                    <!-- // Now we want to display the total of the shopping cart -->
                    <tr>
                        <td colspan ="3" align ="right"> Total</td>
                        <!-- will show total with 2 number decimal point -->
                        <td align= "right">$ <?php echo number_format($total,2); ?></td>
                        <td></td>
                    </tr>
                <?php   
                }
                ?>
            </table>
        </div>
     </div>
 </div>
</div>

</body>
</html>

<script>
// This is the code to add a product to the cart
$(document).ready(function(data){
    console.log(data);
    // When we click add to the cart button this code will execute
    $('.add_to_cart').click(function(){
        // we will use the vinNum as the id
        var product_id = $(this).attr("id");
        // store the name of the car
        var product_name = $('#name' + product_id).val();
     
        // we get the price of the car and store it
        var product_price = $('#price' + product_id).val();
        // we fetch the quanity of cars to rent and store into the variable
        var product_quantity = $('#quantity' + product_id).val();
        // here we add the product into the cart
        var action = "Add";
        // checks if value of product quantity is greater than 0
        if(product_quantity > 0){
        /*   If the value is greater then we redirect
         to the action.php page and its a POST method
         We have the data type which is JSON and then we
         say which data we want to send
        */
            $.ajax({
                url: "action.php",
                method:"POST",
                dataType:"json",
                data:{
                    // we are sending this data to the server
                    product_id:product_id,
                    product_name:product_name,
                    product_price:product_price,
                    product_quantity:product_quantity,
                    action:action

                },
                // callback will receive data from server and store in data argument
                success:function(data){
                    // We have now received the data in JSON format
                    $('#order_table').html(data.order_table);
                    // Also display total amount in shopping cart
                    // It will show in the badge class above
                    $('.badge').text(data.cart_item);
                    alert("Product has been added to cart");
                },
                error:function(data){
            // Must enter quantity of cars to rent
            // alert(data)
            // console.log("No request being fired");
            alert("Please enter number of Quantity");
                }
            });
        }

                // alert(product_id);

     });
});
</script>
