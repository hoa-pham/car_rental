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
