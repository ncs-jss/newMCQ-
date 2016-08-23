<?php
	session_start();
	if(!$_SESSION['adminlogin'])
		header("location:../admin.php");
	else
	if(isset($_GET['make']))
	{
		include("db_connect.php");
		$x=$_GET['make'];
		$query="UPDATE enable_mcq SET mcq_state='$x'";
		mysqli_query($con,$query);
		include("db_disconnect.php");
		header("location:../admin.php");
	}
?>	

