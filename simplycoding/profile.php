 	<link rel="stylesheet" href="profile.css">
<head>
	<title>Profile</title>
</head>
<?php
require 'db_key.php';
$conn = connect_db();
session_start();
if( !isset( $_SESSION['username']) ){
echo "You are not authorized to view this page. Go <a href= 'loginForm.php'>Login</a>";
exit();
}
?>
 <div class="menu-btn">
    <i class="fas fa-bars fa-2x"></i>
  </div>
  <div class="container">
    <!-- Nav -->
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
    <!-- Showcase -->
    <header class="showcase">
      <h1>	  
	  <?php
	  $sql = "Select simplycoding_user.id from simplycoding_user Where username = '$username'";
		#$result = mysqli_query($conn, $sql);
		#id = mysqli_fetch_assoc($result);
		$sql = $conn->query($sql);
		$id = $sql->fetch_assoc();
		$id = $id["id"];	
		echo  " " .$username;
		?>
	  </h1>
      <h2>
        <?php
	  echo  "#" . $id;
	  ?>
      </h2>
      <a href="TOBEEDITED.php" class="btn">
        Edit Profile <i class="fas fa-chevron-right"></i>
      </a>
    </header>
    <!-- Home cards 1 -->
    <section class="home-cards">
	 <?php
		$sql= "SELECT recipename, username, description, image FROM cakes WHERE username = '$username' order by uploaded desc";
		$result = $conn-> query($sql);
		if ($result -> num_rows > 0){
			while ($row = $result-> fetch_assoc()){
				echo "<div>"; 
				#krsort($row);
	?>
			<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
	<?php
		echo "<h3>". $row["recipename"] . "</h3>by <a href=>". $row["username"] . "</a><p>". $row["description"] . "</p>";
		#$username = $_SESSION['username'];
		$x = $row["recipename"];
				?>
				      <a href="editForm.php?recipename=<?php echo $x; ?>" class="btn">
        Edit <i class="fas fa-chevron-right"></i>
      </a>
			</div>	
				<?php	
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		$conn->close();
		?>
	   </div>
      <footer class="footer">
        <div class="footer-inner">
          <div><i class="fas fa-globe fa-2x"></i> English (Philippines)</div>
          <ul>
            <li><a href="#">Sitemap</a></li>
					<li><a href="#">Contact Developer</a></li>
					<li><a href="#">Privacy & cookies</a></li>
					<li><a href="#">Terms of use</a></li>
					<li><a href="#">Trademarks</a></li>
					<li><a href="#">Safety & eco</a></li>
					<li><a href="#">About our ads</a></li>
					<li><a href="#">&copy; Cakes and desserts</a></li>
          </ul>
        </div>
      </footer>
	  	  <div>
	  <section class="follow">
        <p>Follow Cakes and desserts</p>
        <a href="https://www.facebook.com/Loligatsu/">
          <img src="https://i.ibb.co/LrVMXNR/social-fb.png" alt="Facebook">
        </a>
        <a href="https://twitter.com">
          <img src="https://i.ibb.co/vJvbLwm/social-twitter.png" alt="Twitter">
        </a>
        <a href="https://linkedin.com">
          <img src="https://i.ibb.co/b30HMhR/social-linkedin.png" alt="Linkedin">
        </a>
      </section>
    </div>
	  
	  
	  
	  