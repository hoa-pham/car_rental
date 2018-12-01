# car_rental
Serever.php
//creat connection
$conn = new mysqli($servername, $username, $password, $DB);

insert($conn,$query);
example: insert($conn,"insert into $TableName value ($whateverValueHere)");

delete($conn,$query);
update($conn,$query);

slectOne($conn,$query, "$key");
selectMu($conn,$query,$numOfRow);

To getting percified data from database
$value = getMu($conn, $query, $numOfRow);

then access to the value
$value[$numOfRow]['keyName']
