<?php
    // Start the session
    // Require the database
    session_start();
    $connect = mysqli_connect("127.0.0.1", "root","", "rentalCar");
 
    // checks if prouct variable is set or not
    if(isset($_POST['product_id'])){
        
        $order_table = '';
        $message = '';

        // If we are trying to add cars into the cart. If we click the add button
        if($_POST['action'] == 'add'){
            // this will check if the shopping cart has something in it. If the session is set
            if(isset($_SESSION['shopping_cart'])){
                // variable for products that are already added into cart
                $is_available = 0;
                // we loop through our shopping cart and increment every time for whats in there
                foreach($_SESSION['shopping_cart'] as $keys => $values){
                    // this will check value of our post and check to make sure its available in our SESSION
                    if($_SESSION['shopping_cart'][$keys]['product_id'] == $_POST['product_id']){
                       // we increment and the number of products in our cart is reflected
                        $is_available++;
                        // now we put how many of that product we have for that specific car. Add product quantity to whats aleady available
                        $_SESSION['shopping_cart']['$keys']['product_quantity'] = $_SESSION['shopping_cart'][$keys]['product_quantity'] + $_POST['product_quantity'];
                    }
                }
                // if we dont have anything in the cart, then we add into the cart
                // If its already in there then we just increase anwyays 
                if($is_available < 1){
                    $item_array = array(
                        // we store the product
                        'product_id' => $_POST['product_id'],
                        'product_name' => $_POST['product_name'],
                        'product_price' => $_POST['product_price'],
                        'product_quantity' => $_POST['product_quantity']
                    );
                    // now we store our items into the session array
                    $_SESSION['shopping_cart'][] = $item_array;
                }

            }
            // If the SESSION is not set
            else{
                $item_array = array(
                    'product_id' => $_POST['product_id'],
                    'product_name' => $_POST['product_name'],
                    'product_price' => $_POST['product_price'],
                    'product_quantity' => $_POST['product_quantity']
                );
                // Now we store this array into our SESSION array
                $_SESSION['shopping_cart'][] = $item_array;
            }
            // Show the shopping car data in a table format
            $order_table .= '
               <table class="table table-bordered">
               <tr>
                <th width = "50%">Car Name</th>
                <th width = "10%">Car Name</th>
                <th width = "20%">Car Name</th>
                <th width = "15%">Car Name</th>
                <th width = "5%">Car Name</th>
               </tr>
            ';
            // checks if the session has a value or not
            if(!empty($_SESSION['shopping_cart'])){
                // this variable will to calculate toatal of shopping cart and then we display it
                $total = 0;
                // And then we loop and print the car information
                // This will all appear In our cart tab
                foreach($_SESSION['shopping_cart'] as $keys => $values){
                    $order_table .= '
                    <tr>
    
                    <td '.$values['product_name'].'</td>
                    <td '.$values['product_quantity'].' </td>
                    <td align="right">$ '.$values['product_price'].'</td>
                    <td align="right">$ '.number_format($values['product_quantity'] * $values['product_price'], 2).'</td>
                    <td><button name="delete" class="delete" id="'.$values['product_id'].'">Delete</button></td>
                   </tr>
                    
                    ';
                    // We will get the total of the whole shopping cart and store in total
                    $total = $total + ($values['product_quantity'] * $values['product_price']);
                }
                // Now we want to show the whole total of the cart
                $order_table  .= '
                    <tr>
                        <td colspan = "3" align= "right">Total</td>
                        <td align = "right">$'.number_format($total,2).'</td>
                        <td></td>
                    </tr>
                
                ';
            }
                $order_table  .= '</table>';
                $output = array(
                    'order_table' => $order_table,
                    // This will count the number of items in our shopping cart for every SESSION
                    'cart_item' => count($_SESSION['shopping_cart'])
                );
                // send data to ajax request
                // converts php array to json string and send to ajax request
                // If everything works well then we got back to our index.php and in 
                // our callback we get this as the data paramter 
                echo json_encode($output);
        
    }
}
?>