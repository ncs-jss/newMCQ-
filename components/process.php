<?php
	include('db_connect.php');
	$val=$_POST['val'];
	if($_POST['id']=='posmarks')
	{
		$query="UPDATE marking_scheme SET positive='$val'";
		if(mysqli_query($con,$query))
			echo $val;
		else
			echo "error";
	}
	if($_POST['id']=='negmarks')
	{
		$query="UPDATE marking_scheme SET negative='$val'";
		if(mysqli_query($con,$query))
			echo $val;
		else
			echo "error";
	}
	if($_POST['id']=='timer')
	{
		$query="UPDATE time_and_questions SET timer='$val'";
		if(mysqli_query($con,$query))
			echo $val;
		else
			echo "error";
	}
	if($_POST['id']=='no_of_ques')
	{
		$query="UPDATE time_and_questions SET no_of_questions='$val'";
		if(mysqli_query($con,$query))
			echo $val;
		else
			echo "error";
	}	
	if($_POST['id']=='myonoffswitch')
	{
		$val--;
		$query="UPDATE marking_scheme SET negative_marking='$val'";
		if(mysqli_query($con,$query))
		{
				if($val)
					echo "On";
				else
					echo "Off";
		}
		else
			echo "error";
	}
	if($_POST['id']=='delques')
	{
		$tbname=$_POST['val'];
		$query="TRUNCATE TABLE $tbname";
		if(mysqli_query($con,$query))
			echo "Deleted";
		else
			echo "Unable to delete";
	}	
	include('db_disconnect.php');
?>