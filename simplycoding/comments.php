<?php
if($_POST){
require 'db_key.php';
$conn = connect_db();
session_start();
$username = $_SESSION['username'];
if(isset($_POST['write']) ){
	if (($_POST['comments'] == ""))  {
		
				echo "Insufficient Information. You may <a href= 'view.php'>Go Back</a> now";
				exit();
			}  else {
	//fetch id
	$comments = $_POST['comments'];
		$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";

		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		$cakeid = $_SESSION['cakeid'];
//insert values
$sql = "Insert Into comments (comments, id, cakeid, username) VALUES ('$comments', '$id', '$cakeid', '$username')";
$sql = $conn->query($sql);
if($sql){
	$x = $_SESSION['recipename'];
header('location: homepage.php?recipename=<?php echo $x; ?>');	
}
}else if(isset($_POST['delete']) ){	
	$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		$cakeid = $_SESSION['cakeid'];
		$sql = "DELETE FROM cakes WHERE cakeid = '$cakeid'";
$sql = $conn->query($sql);
if($sql){
	unset($_SESSION['cakeid']);
header('location: profile.php');
}	
}
}else{
echo "Password doesnt match. You may <a href= 'loginForm.php'>Go Back</a> now";
				exit();
}
?>