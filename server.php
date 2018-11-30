<?php
    $servername = "localhost";
	$username = "vtran32";
	$password = "vtran32";
	$DB = "vtran32";
	//creat connection
	$conn = new mysqli($servername, $username, $password, $DB);
	
	//adding to the database
	/*
	insert($database,$query);
	insert($conn,"insert into cars value ('22222237000', 'truck', 'black red', 2019,'Honda')");
	*/
	function insert($conn,$query){
		//$query = "insert into " .$table ." value " .$value;
		//using -> to insert DB
		$result = $conn->query($query);
		if($result) echo "<script>console.log('DB connected successfully!')</script>";
		else echo "<script>console.log('Error: " .mysqli_error($conn)."')</script>";
		//close DB
	}
	
	//update the database
	/*example
	"UPDATE MyGuests SET lastname='Doe' WHERE id=2";
	update($conn,"update cars set color='REdddddddasdwasd' where vinNum = 22222237000;");
	*/
	function update($conn,$query){
		$result = $conn->query($query);
		if($result) echo "successfully!";
		else echo "Error:" .mysqli_error($conn);
	}

	//delete database
	/*example
	"DELETE FROM MyGuests WHERE id=3"
	delete($conn,"delete from cars where vinNum=22222237000");
	*/
	function delete($conn,$query){
		$result = $conn->query($query);
		if($result) echo "<script>console.log('DB connected successfully!')</script>";
		else echo "<script>console.log('Error: " .mysqli_error($conn)."')</script>";
	}

	//viewing single row
	/*
	$sql = "SELECT id, firstname, lastname FROM MyGuests";
	viewDB($conn,"select * from cars");
	*/
	function getOne($conn, $query,$keyName){
		$result = $conn->query($query);
		if($result) echo "<script>console.log('DB connected successfully!')</script>";
		else echo "<script>console.log('Error: " .mysqli_error($conn)."')</script>";

		if ($result->num_rows > 0) {

		    // output data of each row
		    $i=0;
		    while($row = $result->fetch_assoc()) {
		    	echo "<script>console.log('" .$i ."')</script>";
		    	echo "<script>console.log('".$keyName .":  " . $row[$keyName] ."')</script>";
		    	// echo "<script>console.log('color:  " . $row["color"] ."')</script>";
		     	// echo "<script>console.log('yearMake:  " . $row["yearMake"] ."')</script>";
		        $i++;
		    }
		} else {
		    echo "0 results";
		}
	}

	getOne($conn,"select * from cars where yearMake=2018 limit 1","vinNum");

	$conn->close();
?>
	<h2>Server side</h2>