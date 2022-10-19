<?php 
	require_once "database.php";
	session_start();
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		die("Unable to connect to mysql".mysqli_connect_error());
	}
	$sql = "delete from subcategory where subcategory_id='$_GET[subcategory_id]'";
	$run_sql = mysqli_query($conn,$sql);
	if($run_sql){
		echo "<script> alert('Deleted record successfully')</script>";
		header("Location: view_subcategory.php");
	}
	else{
		echo "<script> alert('failed to delete')</script>"; 
	}
?>
<script type="text/javascript">
		function preventBack(){ window.history.forward();}
		setTimeout("preventBack()",0);
		window.onunload = function () {null};
	</script>