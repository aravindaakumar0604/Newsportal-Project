<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		include('header.php');
	?>
</head>
<body bgcolor="#ADD8E6">
	<div class="main">
		<form action="index.php" method='POST'>
			<label class="side">Username:</label>
			<input type="text" name="loginusername" class="input" size="70" required><br>
			<br>
			<label class="side">Password:</label>
			<input type="password" name="loginpassword" class="input" size="70" required><br>
			<br>
			<input type="submit" name="Submit" id="submit" class="button"/>
			<h3 style="color:blue;">Not a user?<a href="register.php" style="color:blue"> Register</a></h3><br/>
		</form>
	</div>
<?php
	session_start();
	require_once "database.php";
	if(isset($_POST["Submit"])){
		$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
			die("Couldn't connect to mysql");
		}
		$j = 0;
		$loginusername = $_POST['loginusername'];
		$loginpassword = $_POST['loginpassword'];
		$sql = "select * from user";
		$result = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($result);
		while($j < $rows){
			$row = mysqli_fetch_array($result);
			if($loginusername == $row['username'] && $loginpassword == $row['password']){
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
				echo '<script>alert("Successfully login")</script>';
				header("location: userhome.php");
			}
			$j++;
		}echo "<h2 class='danger'>invalid username or password</h2>";
	}
	?>
</body>

</html>
<?php 
		include('footer.php');
?>