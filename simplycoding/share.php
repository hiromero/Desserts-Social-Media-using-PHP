<?php
if($_POST){
require 'db_key.php';
$conn = connect_db();
session_start();
$username = $_SESSION['username'];

if(isset($_POST['share']) ){
	if (($_POST['recipename'] == "") || ($_POST['description'] == ""))  {
		
				echo "Insufficient Information. You may <a href= 'shareform.php'>Go Back</a> now";
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
         
            // Insert image content into database 
        //    $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())"); 
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
//insert values
$sql = "Insert Into cakes (recipename, description, ingredients, directions, image, id, username,uploaded) VALUES ('$recipename', '$description', '$ingredients','$directions', '$imgContent', '$id','$username',NOW())";
$sql = $conn->query($sql);
if($sql){
header('location: homePage.php');
//header('location: index.php');
}
}else if(isset($_POST['login']) ){
$username = $_POST['username'];
$password = $_POST['password'];
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);
$sql = "Select * From simplycoding_user Where username = '$username'";
$sql = $conn->query($sql);
if($sql){
$sql = $sql->fetch_assoc();
if(password_verify($password, $sql['password'])){
session_start();
$_SESSION['username'] = $username;
echo 'You have successfully logged-in';
header('location: homePage.php');
}
}else{
echo "Password doesnt match. You may <a href= 'loginForm.php'>Go Back</a> now";
				exit();
}
}
}else{
echo "Password doesnt match. You may <a href= 'loginForm.php'>Go Back</a> now";
				exit();
}
//header('location: index.php');
?>