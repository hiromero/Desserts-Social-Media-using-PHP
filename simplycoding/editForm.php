		<link rel="stylesheet" href="homepage.css">
		<link rel="stylesheet" href="loginform.css">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Edit recipe</title>

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
	  <li>
      <p>Welcome
	   <i class="fas fa-search"></i>
          </p>
        </li>
	  
        <li big strong>
        <?php 
	require 'db_key.php';
	$conn = connect_db();
	
		$username = $_SESSION['username'];
		$recipename = $_GET["recipename"];
		$sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];
		
	
		?>
		
		<a href="profile.php">
        <?php 
		$username = $_SESSION['username'];
		echo $username;
		?>
		</a>
		
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
	<form METHOD="post" ACTION="edit.php" enctype="multipart/form-data" onsubmit="return confirm('Are you sure ?');">
	
	<?php 
	$sql = "Select * from cakes Where recipename = '$recipename'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$sql = $sql->fetch_assoc();
		$description = $sql["description"];
		$ingredients = $sql["ingredients"];
		$directions = $sql["directions"];
		$image = $sql["image"];
		$cakeid = $sql["cakeid"];
		$_SESSION['cakeid'] = $cakeid;
		
	?>
	
	
	
	
      <tr>
        <th colspan="2"><big><p style="color:#8B4513">Edit Recipe #<?php echo $cakeid; ?></p></big></th>
		<input type="submit" NAME="delete" VALUE="X" style="width: 10%; margin-left: 90%">
      </tr>	
      <tr>
        <td>Name of Recipe</td>
        <td><input type="text" name="recipename" size="20" value="<?php echo $recipename; ?>"></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><input type="text" name="description" size="20" value="<?php echo $description; ?>"></td>
      </tr>
      <tr>
        <td>Ingredients</td>
        <td><textarea name = "ingredients"
                  rows = "20"
                  cols = "40"><?php echo $ingredients; ?></textarea></td>
      </tr>
	   <tr>
        <td>Directions</td>
        <td><textarea name = "directions"
                  rows = "20"
                  cols = "40"><?php echo $directions; ?></textarea></td>
		</tr>
		<tr>
        <td>Add photos</td>
        <td>
		<p><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($sql['image']); ?>" width="200" height="150" /> </p>
		<input type="file" name="image" value="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($sql['image']); ?>"/> </td>
      </tr>

    </table><br>
	<input type="submit" NAME="edit" VALUE="Update"/>
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
	