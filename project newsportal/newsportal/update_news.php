<?php 
	require_once "database.php";
	session_start();
	$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
			die("Couldn't connect to Mysql".mysqli_connect_error());
		}
		$category = "";
		$description = "";
		$sql = mysqli_query($conn,"select * from news where newsid='$_GET[newsid]'");
		while($row = mysqli_fetch_assoc($sql)){
			$title = $row['title'];	
			$description = $row['description'];
			$date = $row['day'];
			$category = $row['category'];
			$subcategory = $row['subcategory'];
			$thumbnails = $row['thumbnails']; 
		}
?>
<html>
<head>
	<?php
		include('header.php');
	?>
	<script type="text/javascript">
		function preventBack(){ window.history.forward();}
		setTimeout("preventBack()",0);
		window.onunload = function () {null};
	</script>
	<title>Update category</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#ADD8E6">
	<?php 
			include('sidebar.php');
		?>
		<div class="floatright">	
			<h2>Welcome <?php echo $_SESSION['ausername'];?></h2><br><br>
			
				<form action="" method='POST' enctype="multipart/form-data">
					<h2>Add news</h2>
					<label>Update Title</label><br>
					<input type="text" name="title" class="input" size="100" value="<?php echo $title?>" required><br>
					<br>
					<label>Update Description</label><br>
					<textarea rows="5" cols="50" name="description" class="inputtext" style="margin-left: 20px;" required><?php echo $description;?></textarea><br><br>
					<label>Update Date</label><br>
					<input type="date" name="date" class="input" size="100" value="<?php echo $date;?>"  required><br>
					<br>
					<label>Update Thumbnails</label><br>
					<input type="file" name="thumbnails" class="inputimage" size="75" value="<?php echo $thumbnails;?>" required><img src="images/<?php echo $thumbnails;?>" alt="image here" width="100" height="100"><br>
					<br>
					<label>Update Category</label><br>
					
					<select id="" class="input" size="100" name="category" value="<?php echo $category;?>" required>
					<?php
						require_once "database.php";
						$conn = mysqli_connect($servername,$username,$password,$database);
						if(!$conn){
							die("Couldn't connect to Mysql".mysqli_connect_error());
						}
						$res = mysqli_query($conn,"select * from category");
						while($row = mysqli_fetch_assoc($res)){
						?>
						<option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
					<?php 
						}
					?>
					</select><br>
					<br>
					<label>Update Sub category</label><br>
					
					<select id="" class="input" size="100" name="subcategory" value="<?php echo $subcategory?>" required>
					<?php
						require_once "database.php";
						$conn = mysqli_connect($servername,$username,$password,$database);
						if(!$conn){
							die("Couldn't connect to Mysql".mysqli_connect_error());
						}
						$res = mysqli_query($conn,"select * from subcategory");
						while($row = mysqli_fetch_assoc($res)){
						?>
						<option value="<?php echo $row['subcategory_name'];?>"><?php echo $row['subcategory_name'];?></option>
					<?php 
						}
					?>
					</select>
						<br>
						<br>
					<button type="submit" name="update" class="button1">Update News</button>
				</form>
		</div>
		
</body>
</html>

<?php
require_once "database.php";
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['update'])){
	$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
 			die("Failed to connect to mysql".mysqli_connect_error());
		}
		$title = $_POST['title'];
		$title = htmlspecialchars($title);
		$title = strip_tags($title);	
		$description = $_POST['description'];
		$description = htmlspecialchars($description);
		$description = strip_tags($description);
		$date = $_POST['date'];
		$category = $_POST['category'];
		$subcategory = $_POST['subcategory'];
		$thumbnails = $_FILES['thumbnails']['name'];
		$tmp_thumbnails = $_FILES['thumbnails']['tmp_name'];
		move_uploaded_file($tmp_thumbnails,"images/$thumbnails");
		$query = "update news set title='$title',description='$description',day='$date',category='$category',subcategory='$subcategory',thumbnails='$thumbnails' where newsid = $_GET[newsid]";
		$run_query = mysqli_query($conn,$query);
	if($run_query){
		echo '<script> alert("Updated record successfully") </script>';
		header("Location: view_news.php");
	}
	else{
		echo '<script> alert("Updation failed") </script>';
	}	
}
?>