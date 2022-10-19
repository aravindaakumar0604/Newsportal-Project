<?php 
require_once "database.php";
session_start();
unset($_SESSION['aid']);
unset($_SESSION['ausername']);
unset($_SESSION['apassword']);
session_destroy();
header("Location: index.php");
?>