<?php
include('db_connect.php');
$query="SELECT * FROM enable_mcq";
$res=mysqli_query($con,$query);
$result=mysqli_fetch_array($res);
include('db_disconnect.php');
?>