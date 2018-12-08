

<?php

$S1available = 1;

$S2available = 0;

$S3available = 1;

$S4available = 1;

$S5available = 0;

$S6available = 0;

$S7available = 1;

$S8available = 1;

$S9available = 0;

$V1available = 1;

$V2available = 1;

$V3available = 0;

$V4available = 1;





?>



<!DOCTYPE html>

<html>



<head>

    <title>Prepay</title>

</head>

<style>

    body {

        background-color: red;

        text-align: center;

    }



    table {

        font-family: arial, sans-serif;

        border-collapse: collapse;

        width: 50%;

        position: relative;

        margin: auto;



    }



    td,

    th {

        border: 1px solid #dddddd;

        text-align: left;

        padding: 8px;

        color: mintcream;

        text-align: center;

    }



    .date {

        box-sizing: border-box;

        color: mintcream;

        font-size: 18px;

        text-align: center;

    }



    h1 {

        text-align: center;

        color: mintcream;

    }



</style>



<body>

    <?php

function stanmod($avail){

    $count1=0;

    if($S1available = 0){$count1++;}

    if($S2available = 0){$count1++;}

    if($S3available = 0){$count1++;}

    if($S4available = 0){$count1++;}

    if($S5available = 0){$count1++;}

    if($S6available = 0){$count1++;}

    if($S7available = 0){$count1++;}

    if($S8available = 0){$count1++;}

    if($S9available = 0){$count1++;}



    date_default_timezone_set('America/New_York');

    $timemod = date("H");

    $price = 6;

if ($count1 >=4){

    $price += 2;

}

if ($timemod < "10" || $timemod > "20" ) {

     $price += 3;

}

    elseif($timemod >= "3" and $timemod <= "18" ){

        $price += 1;

    }

if ($avail == 0){

    $price = 0;

}

if ($price ==0){

    echo '-';

}

    else{

        echo '$'.$price;

    }



}



function availprint($avail){

    if ($avail == 0){

    echo "No";}



        else{

            echo "Yes";}

}



 function vipmod($avail){

    $count2=0;

    if($V1available = 0){$count2++;}

    if($V2available = 0){$count2++;}

    if($V3available = 0){$count2++;}

    if($V4available = 0){$count2++;}

    date_default_timezone_set('America/New_York');

    $timemod = date("H");

    $price = 11;

     if ($count2 >=3){

    $price += 2;

}

if ($timemod < "10" || $timemod > "20" ) {

     $price += 4;

}

    elseif($timemod >= "3" and $timemod <= "18" ){

        $price += 3;

    }

if ($avail == 0){

    $price = 0;

}

if ($price ==0){

    echo '-';

}

    else{

        echo '$'.$price;

    }}



?>



    <p class="date">

        <span id="date"></span>

    </p>

    <h1>Standard Parking</h1>

    <table>

        <tr>

            <th>Available</th>

            <th>Parking Space Number</th>

            <th>Price</th>



        </tr>

        <tr>

            <td>

                <?php availprint($S1available)?>

            </td>

            <td>S1</td>

            <td>

                <?php stanmod($S1available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S2available)?>

            </td>

            <td>S2</td>

            <td>

                <?php stanmod($S2available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S3available)?>

            </td>

            <td>S3</td>

            <td>

                <?php stanmod($S3available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S4available)?>

            </td>

            <td>S4</td>

            <td>

                <?php stanmod($S4available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S5available)?>

            </td>

            <td>S5</td>

            <td>

                <?php stanmod($S5available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S6available)?>

            </td>

            <td>S6</td>

            <td>

                <?php stanmod($S6available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S7available)?>

            </td>

            <td>S7</td>

            <td>

                <?php stanmod($S7available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S8available)?>

            </td>

            <td>S8</td>

            <td>

                <?php stanmod($S8available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($S9available)?>

            </td>

            <td>S9</td>

            <td>

                <?php stanmod($S9available)?>

            </td>



        </tr>

    </table>



    <h1>VIP Parking</h1>

    <table>

        <tr>

            <th>Available</th>

            <th>Parking Space Number</th>

            <th>Price</th>



        </tr>

        <tr>

            <td>

                <?php availprint($V1available)?>

            </td>

            <td>V1</td>

            <td>

                <?php vipmod($V1available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($V2available)?>

            </td>

            <td>V2</td>

            <td>

                <?php vipmod($V2available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($V3available)?>

            </td>

            <td>V3</td>

            <td>

                <?php vipmod($V3available)?>

            </td>



        </tr>

        <tr>

            <td>

                <?php availprint($V4available)?>

            </td>

            <td>V4</td>

            <td>

                <?php vipmod($V4available)?>

            </td>



    </table>

    <script>

        var today = new Date();

        document.getElementById('date').innerHTML = today;



    </script>

<a href="/home.php" class="w3-button w3-black">Back Home</a>





</body>



</html>