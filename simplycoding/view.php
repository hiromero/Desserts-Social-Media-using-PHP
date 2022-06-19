		<link rel="stylesheet" href="homepage.css">
		<link rel="stylesheet" href="loginform.css">
<html>
	<head>
		<meta charset="UTF-8">
		<title>Recipe</title>

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
	<form METHOD="post" ACTION="comments.php" enctype="multipart/form-data">
	
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
        <th colspan="2"><big><p style="color:#8B4513">Recipe #<?php echo $cakeid; ?></p></big></th>
		<input type="submit" NAME="ew" VALUE="X" style="width: 10%; margin-left: 90%">
      </tr>	
      <tr>
        <td>Name of Recipe</td>
        <td><strong><big><h2><?php echo $recipename; ?></td>
      </tr>
	  
	  <tr>
        
        <td colspan="2">
		<p><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($sql['image']); ?>" width="400" height="300" /> </p>
		 </td>
      </tr>
	  
      <tr>
        <td>Description</td>
        <td><strong><big><?php echo $description; ?></td>
      </tr>
      <tr>
        <td>Ingredients</td>
        <td><strong><big><?php echo $ingredients; ?></td>
      </tr>
	   <tr>
        <td>Directions</td>
        <td><strong><big><?php echo $directions; ?></td>
		</tr>
		

    </table><br>
	
	

</td>

	<td style="vertical-align: top;
  text-align: left;  margin-top: 15px;">
  
  
   <?php
		$sql= "Select * from comments Where cakeid = '$cakeid'";
		$result = $conn-> query($sql);
		if ($result -> num_rows > 0){
			while ($row = $result-> fetch_assoc()){
				echo ""; 
				#krsort($row);
	?>
		<div class="Yorder" style="margin-top: 15px;
  height: ;
  padding: 10px;
  border: 10px solid #FFFACD;">
		
		
		
	<?php
		echo "by <a href=>". $row["username"] . "</a><p>". $row["comments"] . "</p>";
		
				?>
				
			</div>
			
				<?php	
			}
			
		}
		else{
			echo "No comments yet";
			
		}
		$conn->close();
		?>
  
  
  
  <label for="comments"></label>
  <textarea name = "comments"
                  rows = "4"
                  cols = "50"
				  placeholder="Write a comment here..."
				  style="margin-top: 15px;"
				  ></textarea>
  <input type="submit" NAME="write" VALUE="Enter"/>

	
	
	
	</td>
</tr>
</table>
  </form>
    </div><!-- Yorder -->
 </div>
</div>

	</body>
</html>
	