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
	// echo getOne($conn,"select * from cars where yearMake=2018 limit 1","color");
	*/
	function getOne($conn,$query,$keyName){
		$keyValue;
		$result = $conn->query($query);
		if($result) echo "<script>console.log('DB connected successfully!')</script>";
		else echo "<script>console.log('Error: " .mysqli_error($conn)."')</script>";

		if ($result->num_rows > 0) {
		    // output data of each row

		    $i=0;
		    while($row = $result->fetch_assoc()) {
		    	if(is_null($row[$keyName])){
		    	$keyValue = "Error: Check Your Key!";
			    } 
			    else{
			    	echo "<script>console.log('" .$i ."')</script>";
			    	echo "<script>console.log('".$keyName .":  " . $row[$keyName] ."')</script>";
			        $i++;
			        $keyValue = $row[$keyName];
			    } 
		    }
		} else {
		    $keyValue = "Error:Check your query!";
		}
		return $keyValue;
	}

	/*function getMu($conn,$query,$rowNum)
		purpose: select mutilple rows at the same time
		return: will return an associated array
		example: [
		{   //row 1
			'key':value,
			'key':value
		},
		{
			//row 2
			'key':value,
			'key':value
		},
		{
			//row 3
			'key':value,
			'key':value
		}
		]
	*/
	function getMu($conn,$query,$rowNum){
		$keyValue=[];
		//checking connection!
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
		    // output data of each row
		    $i=0;
		    while($row = $result->fetch_assoc() && i < $rowNum) {
			    // echo "<script>console.log('" .$i ."')</script>";
			    echo "<script>console.log('" . $row[0] ."')</script>";
			    $i++;
			    $keyValue.push($row);
		  	}
		} 
		else {
		    echo "0 results";
		}
		return $keyValue;
		
	}
	getMu($conn,"select * from cars",3);
	

	$conn->close();
?>
	<h2>Server side</h2>