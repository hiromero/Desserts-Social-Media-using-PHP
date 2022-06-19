<table class="home-cards">
		
		<?php
		$sql= "SELECT recipename, username, description, image FROM cakes ";
		$result = $conn-> query($sql);
		
		if ($result -> num_rows > 0){
			while ($row = $result-> fetch_assoc()){
				echo "<div>";
				echo "<tr><td>". $row["recipename"] . "</td><td>". $row["username"] . "</td><td>". $row["description"] . "</td><td>" . "</td><td>";
				?>
				<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
				</td></tr>
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