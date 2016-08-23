<?php
    session_start();
    include("components/mcqstate.php");
    if(!$result['mcq_state'])
      {
        $_SESSION['message']="MCQ Disabled by Administrator";
        header("location:admin.php");
      }
	if($_GET['logout_stat'])
	{
		$x=3600;
		setcookie("ansarray",'0',time()+$x);
		setcookie("ques_id",'0',time()+$x);
		setcookie("id",'0',time()+$x);
		setcookie("arr",serialize($_SESSION['arr']),time()+$x);		
		$us=$_GET['us'];
		$query="UPDATE  details SET Logout_status=0 WHERE email = '$us'";
		include("components/db_connect.php");
		mysqli_query($con,$query);
		include("components/db_disconnect.php");
	}
	else
	{		
		if(isset($_COOKIE['id'])&&isset($_COOKIE['ques_id'])&&isset($_COOKIE['ansarray'])&&isset($_COOKIE['arr']))
		{
			$_SESSION['id']=unserialize($_COOKIE['id'])-1;
			if($_SESSION['id']==$_SESSION['no_of_ques'])
			$_SESSION['id']+=2;		
			$_SESSION['ques_id']=unserialize($_COOKIE['ques_id']);
			$_SESSION['ansarray']=unserialize($_COOKIE['ansarray']);
			$_SESSION['arr']=unserialize($_COOKIE['arr']);
		}
		else
			echo '<script>self.location="logout.php"</script>';
	}
	echo '<script>self.location="mcq.php"+"?q="+Math.random()</script>';
?>