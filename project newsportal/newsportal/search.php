<?php
session_start(); 
require_once "database.php";
?>
<!DOCTYPE html>
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
		include('userheader.php');
	?>
	<title>Display news</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#ADD8E6">
	<div id="google_translate_element"></div>
 
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
 
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<div class="wrap_1"><div class="floatleft1"><?php
		include('user_sidebar.php');
	?>
	</div>
	<div class="floatright_1">
		<form style="margin-left:15px" action="search.php" method="POST">
			<input type="text" name="text" style="height: 35px;width:200px;font-size: 1.5em;"/><br /><br />
			<input type="submit" name="search" value="Search" class="search"/><br/>
		</form>

		<h4>Latest Posts</h4>
		<marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="up" background-color="whitesmoke">
<?php 
	require_once "database.php";
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		die("Couldn't connect to Mysql".mysqli_connect_error());
	}
	$sql = "select * from news order by newsid desc limit 5";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
?>
			<div class="latest_posts">
				<a href="view_individual_page.php?title=<?php echo $row['title'];?>" value="<?php echo $row['title'];?>" name="<?php echo $row['title'];?>">
				<img src="images/<?php echo $row['thumbnails'];?>" alt="Image here" width="50" height="50"><br/>
				<h6 style="font-family: Helvetica;color: darkblue;float:left;background-color: whitesmoke;"><?php echo $row['title'];?></h6><br/></a>
			</div>
 		<?php
 	}
 	
 		?>
			</marquee>
	</div>
		<div class="floatcenter">
		<marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="left" bgcolor="white" width="100%">
<?php 
	require_once "database.php";
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		die("Couldn't connect to Mysql".mysqli_connect_error());
	}
	$sql = "select * from news order by newsid desc limit 1";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
?>
			<a href="view_individual_page.php?title=<?php echo $row['title'];?>" value="<?php echo $row['title'];?>" name="<?php echo $row['title'];?>">
				<font class="breaking">breaking news :<?php echo $row['title'];?></font>&nbsp;&nbsp;
			</a>
<?php 
	}
?>

			</marquee>
			<h2>Welcome <?php echo $_SESSION['username'];?></h2><br/><br/>
			
			<?php
			require_once "database.php";
			error_reporting(E_ERROR|E_PARSE);
			$page = $_GET['page'];
			if($page=="" || $page==1){
				$page1 = 0;
			} 
			else{
				$page1 =($page*2)-2;
			}
			?>
<?php 
	session_start();
	require_once "database.php";
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		die("Couldn't connect to Mysql".mysqli_connect_error());
	}
	if(isset($_POST["search"])){
		$search = $_POST["text"];
		$sql = "select * from news where title like '%$search%' limit $page1,3";
		$result = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($result);
		if($rows == 0){
			echo "No Result Found";
		}
	}
		while($row = mysqli_fetch_assoc($result)){
?>
			<div class="posts" align="center">
			<a href="view_individual_page.php?title=<?php echo $row['title'];?>" value="<?php echo $row['title'];?>" name="<?php echo $row['title'];?>">
				<h3 style="font-family: Helvetica;color: darkblue;float:left;"><?php echo $row['title'];?></h3><br/><br/>&nbsp;&nbsp;</a>
				<center><h6><?php echo $row['day'];?><br/>
				<?php echo $row['category'];?>
				<?php echo $row['subcategory'];?></h6></center><br/>
				<center><img src="images/<?php echo $row['thumbnails'];?>" alt="Image here" width="350" height="350"></center><br>
				<?php echo $row['description'];?><br/><br/><hr>

			</div>

 		<?php
 	}
 	$run = mysqli_query($conn,"select * from news where title like '%$search%' limit $page1,3");
 	$count = mysqli_num_rows($run);
 	$a = $count/2;
 	echo ceil($a);
 	for($b=1;$b<=$a;$b++){
 		?>
 
 	<ul class="page">
 		<li class="pagination">
 		<a href="userhome.php?page=<?php
 		echo $b; ?>"><?php echo $b; ?></a></li>
 	</ul>	
 	<?php 
 		}
		?>

	</div>
	</div>
	
	
</body>
</html>