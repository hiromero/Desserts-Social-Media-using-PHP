<?php
$sql_host="localhost";
$sql_username="root";
$sql_password='';
$sql_database="simplycoding";
function connect_db() {
global $sql_host, $sql_username, $sql_password, $sql_database;
$conn=new mysqli($sql_host,$sql_username,$sql_password);
#$sql= "SELECT * FROM simplycoding_user INNER JOIN cakes ON simplycoding_user.id = cakes.id "
if(mysqli_connect_error($conn) !== null) {
return false;
}
$conn -> select_db($sql_database);
return $conn;
}
?>

