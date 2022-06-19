<?php
session_start(); //to ensure you are using same session
if(isset($_SESSION['username']) ){
session_destroy(); //destroy the session
header('location: loginForm.php'); //
exit();
}else{
echo "You are not authorized to view this page. Go to <a href= 'loginForm.php'>Login Page</a>";
}
?>