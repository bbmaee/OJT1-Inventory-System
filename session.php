<?php
	session_start();
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../tables.php');
    exit();
	}
	
	include('../config.php');

	$sq=mysqli_query($conn,"select * from `stock` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$article=$srow['article'];
?>