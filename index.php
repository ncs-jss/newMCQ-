<?php
	include("components/mcqstate.php");
	if($result['mcq_state'])
		header("location:home.php");
	else
		header("location:admin.php");
?>