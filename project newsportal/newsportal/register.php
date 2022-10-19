<html>
<head>
	<title>Register page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#ADD8E6">
	<?php
		include('header.php');
	?>
		
	<div class="main">
		<form action="" method='POST'>
			<label class="side">User Id: &nbsp; &nbsp;</label>
			<input type="text" name="userid" class="input" size="70" required><br>
			<br>
			<label class="side">Firstname:</label>
			<input type="text" name="firstname" class="input" size="70" required><br>
			<br>
			<label class="side">Lastname:</label>
			<input type="text" name="lastname" class="input" size="70" required><br>
			<br>
			<label class="side">Username:</label>
			<input type="text" name="username" class="input" size="70" required><br>
			<br>
			<label class="side">Password:</label>
			<input type="password" name="password" class="input" size="70" required><br>
			<br>
			<button type="submit" name="register" id="register" class="button">Register</button>
			<h3 style="color:blue;">Already a user?<a href="index.php" style="color:blue"> Login</a></h3>
		</form>	
	</div>
<?php 
	require_once "database.php";
	if(isset($_POST["register"])){
		$conn = mysqli_connect($servername,$username,$password,$database);
		if(!$conn){
			die("Couldn't connect to Mysql".mysqli_connect_error());
		}
		$userid = $_POST['userid'];
		$firstname = strip_tags($_POST['firstname']);
		$firstname = str_replace(' ','',$firstname);
		$firstname = ucfirst(strtolower($firstname));
		$_SESSION['firstname'] = $firstname;
		$lastname = strip_tags($_POST['lastname']);
		$lastname = str_replace(' ','',$lastname);
		$lastname = ucfirst(strtolower($lastname));
		$_SESSION['lastname'] = $lastname;
		$username = strip_tags($_POST['username']);
		$username = str_replace(' ','',$username);
		$_SESSION['username'] = $username; 
		$password = $_POST['password'];
		$query = "select * from user";
		$run_query = mysqli_query($conn,$query);
		$rows = mysqli_num_rows($run_query);
		for($j = 0;$j < $rows;++$j){
			$row = mysqli_fetch_assoc($run_query);
			if($username == $row['username']){
				if($password == $row['password']){
					echo "<p class='danger'>Username and password already exists</p>";
					break;
				}
				echo "<p class='danger'>Username already exists</p>";
				break;
			}
		}
		$sql = "insert into user values ('$userid','$firstname','$lastname','$username','$password')";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo "<p class='success'>You have registered successfully ...You may login now</p>";
		}
		else{
			echo "<p class='danger'>Insert failed </p>";
		}
	}
?>
	
</body>
</html>