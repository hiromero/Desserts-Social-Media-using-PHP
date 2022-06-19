<?php
if($_POST){
require 'db_key.php';
$conn = connect_db();
session_start();
$username = $_SESSION['username'];

if(isset($_POST['edit']) ){
	if (($_POST['recipename'] == "") || ($_POST['description'] == "") )  {
		
				echo "Insufficient Information. You may <a href= 'profile.php'>Go Back</a> now";
				exit();
			}  else {
$recipename = $_POST['recipename'];
$description = $_POST['description'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];

//get img info
	 $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
		}
			}	
//sanitize your input
//check for existing record
	//fetch id
		$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		$cakeid = $_SESSION['cakeid'];
//insert values
#$sql = "Insert Into cakes (recipename, description, ingredients, directions, image, id, username,uploaded) VALUES ('$recipename', '$description', '$ingredients','$directions', '$imgContent', '$id','$username',NOW())";

$sql = "UPDATE cakes SET recipename = '$recipename'
						,description = '$description'
						,ingredients = '$ingredients'
						,directions = '$directions'
						,image = '$imgContent' WHERE cakeid = '$cakeid'";
$sql = $conn->query($sql);
if($sql){
	unset($_SESSION['cakeid']);
header('location: profile.php');
//header('location: index.php');
}
}else if(isset($_POST['delete']) ){
	$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		$cakeid = $_SESSION['cakeid'];
		$sql = "DELETE FROM cakes WHERE cakeid = '$cakeid'";
$sql = $conn->query($sql);
if($sql){
	unset($_SESSION['cakeid']);
header('location: profile.php');
//header('location: index.php');
}

}
}else{
echo "Cannot match. You may <a href= 'loginForm.php'>Go Back</a> now";
				exit();
}
//header('location: index.php');
?>