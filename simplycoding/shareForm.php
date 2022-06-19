		<link rel="stylesheet" href="homepage.css">
		<link rel="stylesheet" href="loginform.css">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Share a recipe</title>

	</head>

	
	
	
	
	<body>
		<?php
		session_start();
	?>
	
		
		<div class="container">
  <div class="title">
  
  <nav class="main-nav">
  <a href= 'homePage.php'>
 <img src="https://theluckycupcakecompany.com/wp-content/uploads/Lucky-Cupcake-Logo-Round-Cupcake.jpg" alt="Logo" class="logo"></a>

      <ul class="main-menu">
	  <!--
		<li><a href="#">Office</a></li>
        <li><a href="#">Windows</a></li>-->
        <li><h2>Cakes and Desserts<h2></li>
		
        <li><a href="homePage.php">Home</a></li>
	
        <li><a href="#">Share</a></li>
		
        <li><a href="#">About us</a></li>
		
      </ul>

      <ul class="right-menu">
      
        <li big strong>
        <?php 
	require 'db_key.php';
	$conn = connect_db();
	
		$username = $_SESSION['username'];
		$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		
		echo  "#" . $id;
		echo  " " .$username;
		?>
            <i class="fas fa-shopping-cart"></i>
          
        </li>
		 <li>
          <a href="logout.php">Logout
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </nav>
	</nav>
  </div>
<div class="d-flex">
  
	<table>
	<tr>
	<td>
	  <div class="Yorder">
    <table>
	<form METHOD="post" ACTION="share.php" enctype="multipart/form-data">
      <tr>
        <th colspan="2"><big><p style="color:#8B4513">Share a Recipe</p></big></th>
      </tr>	
      <tr>
        <td>Name of Recipe</td>
        <td><input type="text" name="recipename" size="20"></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><input type="text" name="description" size="20"></td>
      </tr>
      <tr>
        <td>Ingredients</td>
        <td><textarea name = "ingredients"
                  rows = "15"
                  cols = "32"></textarea></td>
      </tr>
	   <tr>
        <td>Directions</td>
        <td><textarea name = "directions"
                  rows = "20"
                  cols = "40"></textarea></td>
		</tr>
		<tr>
        <td>Add photos</td>
        <td><input type="file" name="image" /></td>
      </tr>

    </table><br>
	<input type="submit" NAME="share" VALUE="Share"/>
  </div><!-- Yorder -->
 </div>
</div>
</td>
 </form>
	<td>
	
	</td>
</tr>
</table>
  </form>

	</body>
</html>
	