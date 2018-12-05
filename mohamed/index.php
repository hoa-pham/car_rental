<?php

session_start();
// Connect to database
$connect = mysqli_connect("127.0.0.1", "root","", "rentalCar");

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
</head>

<body>
   <br />
   <!-- Car Inventory will display across the screen -->
   <div class = "container" style="width:1000px;">
     <h2 align="center"> Car Inventory</h2></br>

     <!-- Two tabs for cart. Nav tabs does this for us  -->
     <ul class = "nav nav-tabs">
     <!-- active defines current page in tab and data toggle is the specific tab
        href will show the Inventory and Cart
      -->
        <li class="active"><a data-toggle="tab" href="#products">Inventory</a></li>
     <!-- The condition will check the value of the shopping cart varialbe if its set or not
     It will then display whats in our shopping cart -->
        <li class="active">
            <a data-toggle="tab" href="#cart">Cart
                <span class="badge">
            <?php
            if(isset($_SESSION['shopping_cart'])){
              echo count($_SESSION['shopping_cart']);
                }else{
                     echo '0';
                    }
             ?>
                </span>
            </a>
        </li>
     <!-- } ?></span> </a></li> -->
    </ul>

    <div class="tab-content">
    <!-- Display things to add into cart -->
         <div id="products" class="tab-pane fade in active">
         <?php
         // fetch everything from the cars table and store in result variable
         $query = "select * from cars";
         $result = mysqli_query($connect,$query);

         // Here we are converting our query to associate array 
         while($row = mysqli_fetch_array($result)){
         
         ?>
         <div class = "col-md-4" style = "margin-top:12px;">
            <div style = "border:1px solid #333; background-color:#f1f1f1;border-radius:5px;
            padding:16px; height:350px;" align="center">

            <!-- we are printing the images from db to the screen -->
            <img src = "pics/<?php echo $row['carPic']; ?>" class="img-responsive" />

            <!-- name of the car -->
            <h4 class="text-info"><?php echo $row['carType'];?></h4>

           <!-- price of the car -->
            <h4 class = "text-danger"><?php echo $row['carPrice'];?></h4>

            <!-- The amount of car you want to rent -->
            <input type="text" name="quantity" id="quantity"<?php echo $row['yearMake'];?>
    
       
            
            <input type = "hiden" name="hidden_name" id="name<?php echo $row["vinNum"];?>" value="<?php echo $row["carType"]; ?>" />  
            <!-- the code above will fetch the product name and vin number -->
           
            <!-- the next line will fetch the prices -->
            <input type="hidden" name="hidden_price" id="price <?php echo $row['vinNum'];?>" value="<?php echo $row['carPrice'];?>" />

            <!-- This line will be the button you click to add to the cart -->
            <input type="button" name="add_to_cart" id="<?php echo $row["vinNum"];?>" class="btn btn-warning form-control add_to_cart" style= "margin-top:5px;" value="Add to Cart" /> 
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
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values)
                    {
                ?>
                        <tr>
                            <td> <?php echo $values['product_name']; ?> </td>
                            <td> <?php echo $values['product_quantity']; ?> </td>
                            <td align = "right"> <?php echo $values['product_price']; ?> </td>
                            <td align = "right"> <?php echo number_format($values['product_quantity'] * $values['product_price']); ?> </td>
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

<script>
// This is the code to add a product to the cart
$(document).ready(function(data)){
    // When we click add to the cart button
    $('.add_to_cart').click(function(){
        var product_id = $(this).attr("id");
        var product_name = $('#name' + product_id).val();
        var product_price = $('#price' + product_id).val();
        var product_quantity = $('#quantity' + product_id).val();
        var action = "Add";
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
                    product_id:product_id,
                    product_name:product_name,
                    product_price:product_price,
                    product_quantity:product_quantity,
                    action:action

                }
                // callback will receive data from server and store in data argument
                success:function(data){
                    // We have now received the data in JSON format
                    $('#order_table').html(data.order_table);
                    // Also display total amount in shopping cart
                    // It will show in the badge class above
                    $('.badge').text(data.cart_item);
                    alert("Product has been added to cart");
                }
            })
        }else{
        // Must enter quantity of cars to rent
            alert("Please enter number of Quantity");
        }
    })
});
</script>
</body>
</html>
