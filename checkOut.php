
<!DOCTYPE html>
<html>
<head>
	<title>Check out</title>
	<!-- bootrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container text-center addPayment" style="margin-top: 5%;">
    <?php include 'server.php';
        $vin = $_GET['vinNum'];
        $vinLst = explode(',', $vin);
        $sum = 0;
        $quanity = array_count_values($vinLst);

        foreach ($quanity as $key => $value) {
            $price = getOne($conn, "select * from cars where vinNum = $key", "carPrice");
            $name = getOne($conn, "select * from cars where vinNum = $key", "manufactor");
            $color = getOne($conn, "select * from cars where vinNum = $key", "color");
            echo "Brand " . $name . " Color: " . $color . " quanity: " . $value . ", Price: $" . $price * $value . "<br>"; 
            $sum = $sum + ($price * $value);
        }
        
        echo "Total price is: $" . $sum . "<br>";
        
    ?>
		<button class="btn btn-lg btn-primary" onclick="formShow()">Add payment</button>
	</div>
	

	<div class="container text-center form payment" style="display: none;">
		<legend>Payment Infomation</legend>
		<form method="" action="" autocomplete="on" id="form">

			<div class="form-group">
				<input type="number" class="form-control" name="cardNum" id="cardNum" placeholder="1234-5467-8910-1112" required min="16">
				<span id="inputMessage" style="font-size: 0.7em; color: red;"></span>
			</div>

			<div class="form-group">
				<input type="text" class="form-control" name="name" id="name" placeholder="John Smith" required>
			</div>

			<div class="form-group row">
				<div class="input-group mb-2 mr-sm-2 mb-sm-0 col-6">
					<input class="form-control" type="date" name="exDate" id="exDate" required>
				</div>

				<div class="input-group mb-2 mr-sm-2 mb-sm-0 col-4">
					<input class="form-control" type="sNum" placeholder="1234" " id="sNum" required>
				</div>
			</div>
			  
			<div class="form-group register text-center">
				<div class="container row">
					<div class="col-4">
						<img id="master" style="height: 60%;width: 60%;" src="pics/cards/mastercard.jpg">
					</div>

					<div class="col-4">
						<img id="visa" style="height: 60%;width: 60%;" src="pics/cards/visa.png">
					</div>

					<div class="col-4">
						<img id="am" style="height: 60%;width: 60%;" src="pics/cards/AM.png">
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary" id="checkCard" disabled onclick="verifyCard()">Use This Card</button>
		</form>
	</div>
	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="checkOut.js"></script>
</body>
</html>
