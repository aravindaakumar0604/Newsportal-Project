<div class="floatleft1">
	<h5 style="color:white">Categories</h5><br>
	<h6><a href="userhome.php"><ul style="list-style-type: none;font-size: 25px;"><li>All  NEWS</li><br><br></ul></a>
			<?php 
				$conn = mysqli_connect($servername,$username,$password,$database);
				if(!$conn){
				die("Couldn't connect to Mysql".mysqli_connect_error());
			}
			$sql = "select * from category";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)){
		?>
		<a href="news_according_to_category.php?category_name=<?php echo $row['category_name'];?>" value="<?php echo $row['category_name'];?>" name="<?php echo $row['category_name'];?>"><ul style="list-style-type: none;font-size: 30px;"><li><?php echo $row['category_name'];?></li><br><br></ul>
			
 		<?php
 	}
		?>
	</a></h6>
</div>