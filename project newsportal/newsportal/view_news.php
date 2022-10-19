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
	<title>View News</title>
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
				<th>TITLE</th>
				<th>DESCRIPTION</th>
				<th>DATE</th>
				<th>CATEGORY</th>
				<th>SUB CATEGORY</th>
				<th>THUMBNAILS</th>
				<th>UPDATE</th>
				<th>DELETE</th>
			</tr>
			<?php
			require_once "database.php";
			error_reporting(E_ERROR|E_PARSE);
			$page = $_GET['page'];
			if($page=="" || $page==1){
				$page1 = 0;
			} 
			else{
				$page1 =($page*3)-3;
			}
			?>
<?php 
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		die("Couldn't connect to Mysql".mysqli_connect_error());
	}
	$sql = "select * from news limit $page1,3";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
?>
		<tr class='viewcategory'>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['day'];?></td>
				<td><?php echo $row['category'];?></td>
				<td><?php echo $row['subcategory'];?></td>
				<td><img src="images/<?php echo $row['thumbnails'];?>" alt="Image here" width="100" height="100"></td>
				<td>
					<button class="button2" name=""><a href="update_news.php?newsid=<?php echo $row['newsid'];?>">Update</a></button>
				</td>
				<td>
					<button class="button3" name=""><a href="delete_news.php?newsid=<?php echo $row['newsid'];?>">Delete</a></button>
				</td>
		</tr>
 		<?php
 	}
 	$run = mysqli_query($conn,"select * from news");
 	$count = mysqli_num_rows($run);
 	$a = ($count/2)-1;
 	echo ceil($a);
 	for($b=1;$b<$a;$b++){
 		?>
 	</table>
 	<ul class="page">
 		<li class="pagination">
 		<a href="view_news.php?page=<?php
 		echo $b; ?>" style="color:blue;"><?php echo $b; ?></a></li>
 	</ul>	
 	<?php 
 		}
		?>

		</div>
	</body>
</html>