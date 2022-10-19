<?php 
	require_once "database.php";
	session_start();
	$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
			die("Couldn't connect to Mysql".mysqli_connect_error());
		}
		$sql = mysqli_query($conn,"select * from subcategory LEFT JOIN category on subcategory.category_id = category.id where subcategory_id='$_GET[subcategory_id]'");
		while($row = mysqli_fetch_assoc($sql)){
			$id = $row['subcategory_id'];
			$category = $row['category_name'];
			$subcategory = $row['subcategory_name'];
		}
?>
<html>
<head>
	<?php
		include('header.php');
		include('footer.php');
	?>
	<script type="text/javascript">
		function preventBack(){ window.history.forward();}
		setTimeout("preventBack()",0);
		window.onunload = function () {null};
	</script>
	<title>Update Sub category</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#ADD8E6">
	<?php 
			include('sidebar.php');
		?>
		<div class="floatright">	
			<h2>Welcome <?php echo $_SESSION['ausername'];?></h2><br><br>
			
				<form action="" method='POST'>
					<label class="labelcontrol">Update Sub Category</label><br>
					<input type="text" class="input" name="subcategory" value="<?php echo $subcategory;?>" size="70" required><br>
					<br>
					<label class="labelcontrol">Update Category</label><br>
					<input type="text" class="input" name="category" value="<?php echo $category;?>" size="70" disabled><br>
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
	$query = "update subcategory set subcategory_name='$_POST[subcategory]' where subcategory_id = $_GET[subcategory_id]";
	$run_query = mysqli_query($conn,$query);
	if($run_query){
		echo '<script> alert("Updated record successfully")</script>';
		header("Location: view_subcategory.php");
	}
	else{
		echo '<script>alert("Updation failed")</script>';
	}	
}
?>