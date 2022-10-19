<?php 
	require_once "database.php";
	session_start();
	$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
			die("Couldn't connect to Mysql".mysqli_connect_error());
		}
		$category = "";
		$description = "";
		$sql = mysqli_query($conn,"select * from category where id='$_GET[id]'");
		while($row = mysqli_fetch_assoc($sql)){
			$id = $row['id'];
			$category = $row['category_name'];
			$description = $row['description'];
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
			
				<form action="" method='POST'>
					<label class="labelcontrol">Update Category</label><br>
					<input type="text" class="input" name="category" value="<?php echo $category;?>" size="70" required><br>
					<br>
					<label class="labelcontrol">Update Desciption</label><br>
					<textarea rows="5" cols="50" class="inputtext" name="description" required><?php echo $description;?></textarea><br>
					<br>
					<button type="submit" name="update" class="button1">Update Category</button>
				</form>
		</div>
		
</body>
</html>

<?php
require_once "database.php";
if(isset($_POST['update'])){
	$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
 			die("Failed to connect to mysql".mysqli_connect_error());
		}
	$query = "update category set category_name='$_POST[category]',description='$_POST[description]' where id = $_GET[id]";
	$run_query = mysqli_query($conn,$query);
	if($run_query){
		echo '<script> alert("Updated record successfully")</script>';
		header("Location: view_category.php");
	}
	else{
		echo '<script>alert("Updation failed"")</script>';
	}	
}
?>