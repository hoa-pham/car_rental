<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="profile.css">
	<?php include 'server.php';?>
</head>
<body>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <div class="container emp-profile">
		<?php
			$userid = $_GET['userid'];
			$fname = getOne($conn,"select * from customerInfo where userId = $userid","fName");
			$lname = getOne($conn,"select * from customerInfo where userId = $userid","lName");
			$birthday = getOne($conn,"select * from customerInfo where userId = $userid","birthDay");
			$username = getOne($conn,"select * from users where userId = $userid","userName");
			$password = getOne($conn,"select * from users where userId = $userid","pass");
			$cardtype = getOne($conn,"select * from payment where userId = $userid","cardType");
		?>
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                        <div class="profile-img">
                        	<?php
                        	function odd(){
                        		global $userid;
                        		if($userid % 2 == 0){
                        			echo "<img src='/pics/female.jpg'>";
                        		} else {
                        			echo "<img src='/pics/male.jpg'>";
                        		}
                        	}
                        	odd();
                        	?>
                            <!-- <img src="/pics/female.jpg" alt=""/> -->
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo "$fname $lname";?>
                                    </h5>
                                  
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" onclick="home()" id="home-tab">Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" onclick="profile()">Order History</a>
                                </li>
                            </ul>
                        </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p># <?php echo"$userid";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"$fname $lname";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"$birthday";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"$username";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"$password";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Payment</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo"$cardtype";?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >    
                                <div class="container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Parking ID</th>
                                                <th scope="col">Date Purchased</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $order = getMu($conn,"select * from orders
                                                                  left join parkingorders using(orderId) 
                                                                  where userId = $userid",3);
                                            foreach($order as $key) {
                                            ?>
                                            <tr>
                                                <th scope="row">#<?php print_r($key['orderId']);?></th>
                                                <td><?php print_r($key['parkId']);?></td>
                                                <td><?php print_r($key['dateOrd']);?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>           
    </div>
    <script type="text/javascript">
        function home(){
        	console.log("home clicked!");
        	$('#home').addClass('show active');
        	$('#profile').removeClass('show active');
        }
        function profile(){
        	console.log("profile clicked!");
        	$('#home').removeClass('show active');
        	$('#profile').addClass('show active');
        }
    </script>
</body>
</html>
