<?php
    session_start();
    include("components/mcqstate.php");
    if(!$result['mcq_state'])
      {
        $_SESSION['message']="MCQ Disabled by Administrator";
        header("location:admin.php");
      }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Logout</title>
		<script src="js/Timer.js"></script>
	</head>
	<body>
		<script>DeleteAllCookies();</script>	
		<?php 
			include("components/db_connect.php");
			$username=$_SESSION['username'];
			$query="UPDATE  details SET Logout_status=1 WHERE email = '$username'";
			mysqli_query($con,$query);
			include("components/db_disconnect.php");
			setcookie("ansarray","",time()-3600);
			setcookie("arr","",time()-3600);
			setcookie("id","",time()-3600);
			setcookie("ques_id","",time()-3600);
			if(session_destroy())
			{
				echo '<script>self.location="home.php"</script>';
			}
		?>
	</body>
</html>
