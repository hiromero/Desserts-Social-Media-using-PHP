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
			
	


//ge
         
            // Insert image content into database 
        //    $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())"); 
		}


				
//sanitize your input

//check for existing record

	//fetch id
	$comments = $_POST['comments'];
		$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		$cakeid = $_SESSION['cakeid'];

//insert values
#$sql = "Insert Into cakes (recipename, description, ingredients, directions, image, id, username,uploaded) VALUES ('$recipename', '$description', '$ingredients','$directions', '$imgContent', '$id','$username',NOW())";

$sql = "Insert Into comments (comments, id, cakeid, username) VALUES ('$comments', '$id', '$cakeid', '$username')";
$sql = $conn->query($sql);


if($sql){
	$x = $_SESSION['recipename'];
	
header('location: homepage.php?recipename=<?php echo $x; ?>');
	
	
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
echo "Password doesnt match. You may <a href= 'loginForm.php'>Go Back</a> now";
				exit();
}
//header('location: index.php');
?>