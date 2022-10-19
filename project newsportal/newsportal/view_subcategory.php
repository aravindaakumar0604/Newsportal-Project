<?php
session_start(); 
require_once "database.php";
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		function preventBack(){ window.history.forward();}
		setTimeout("preventBack()",0);
		window.onunload = function () {null};
	</script>
	<?php
		include('header.php');
	?>
	<title>View SubCategory</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#ADD8E6">
		<?php 
			include('sidebar.php');
		?>
		<div class="floatright">	
			<h2>Welcome <?php echo $_SESSION['ausername'];?></h2><br><br>
			<table>
			<tr>
				<th>CATEGORY NAME</th>
				<th>SUB CATEGORY NAME</th>
				<th>UPDATE</th>
				<th>DELETE</th>
			</tr>
<?php 
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		die("Couldn't connect to Mysql".mysqli_connect_error());
	}
	$sql = "select * from subcategory LEFT JOIN category on subcategory.category_id = category.id";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
?>
		<tr>
				<td><?php echo $row['category_name'];?></td>
				<td><?php echo $row['subcategory_name'];?></td>
				<td>
					<button class="button2" name=""><a href="update_subcategory.php?subcategory_id=<?php echo $row['subcategory_id'];?>">Update</a></button>
				</td>
				<td>
					<button class="button3" name=""><a href="delete_subcategory.php?subcategory_id=<?php echo $row['subcategory_id'];?>">Delete</a></button>
				</td>
		</tr>
 		<?php
 	}
		?>
			</table>
		</div>
	</body>
</html>