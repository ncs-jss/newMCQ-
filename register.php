<?php
    session_start();
    include("components/mcqstate.php");
    if(!$result['mcq_state'])
      {
        $_SESSION['message']="MCQ Disabled by Administrator";
        header("location:admin.php");
      }
?>
<?php  
	session_destroy();
	session_start();
	if($_POST['f_name'] && $_POST['branch'] && $_POST['email'] && $_POST['pass'] && $_POST['gndr'] && $_POST['rpass']&&$_POST['year'])
	{ 
		$no_of_rows=checkrows();
		if($no_of_rows>0)
		{
			$_SESSION['signup_error']=' Email already exist....';
			echo '<script>self.location="signup.php"</script>';
		}
		else
		{	
			if($_POST['pass']==$_POST['rpass'])
			{
				include("components/db_connect.php");
				$gender=mysqli_real_escape_string($con,trim($_POST['gndr']));
				$firstname=mysqli_real_escape_string($con,trim($_POST['f_name']));
				$branchyear=mysqli_real_escape_string($con,trim($_POST['branch']));
				$email=mysqli_real_escape_string($con,trim($_POST['email']));
				$password=md5(mysqli_real_escape_string($con,trim($_POST['pass'])));
				$year=mysqli_real_escape_string($con,trim($_POST['year']));
				if(validate_email($email)==false) 
				{
					$_SESSION['signup_error']=" Enter a valid email....";
					echo '<script>self.location="signup.php"</script>'; 
				}
				else
				{
					$x = "INSERT INTO details (gender,name,Year,branch,email,password) VALUES ('$gender','$firstname','$year','$branchyear','$email','$password')";
					if (!mysqli_query($con,$x))
						echo "error";
					else 
					{ 
						include("components/db_disconnect.php");
						$_SESSION['success']=" Please signin to continue";
						$_SESSION["logging"]=false;
						$_SESSION["logged"]=false;
						$_SESSION['id']=1;
						$_SESSION['correctans']=0;
						$_SESSION['completed']=0;
						echo '<script>self.location="login.php"</script>';
					}
				}
			} 
			else 
			{
				$_SESSION['signup_error']=" Password does not match....";
				echo '<script>self.location="signup.php"</script>';
			}
		}
	}
	else 
	{
		$_SESSION['signup_error']=" Please enter all details....";
		echo '<script>self.location="signup.php"</script>';
	}
	function checkrows()
	{
		include("components/db_connect.php");
		$username=$_POST['email'];
		$x="select * from details where email='$username'";
		$result=mysqli_prepare($con,$x);
		mysqli_stmt_execute($result);
		mysqli_stmt_store_result($result);
		$y =  mysqli_stmt_num_rows($result);
		include("components/db_disconnect.php");
		return $y;
	}
	function validate_email($field)
	{
		$field=filter_var($field, FILTER_SANITIZE_EMAIL);
		if(filter_var($field, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		else
		{
			return false;
		}
	}             
?>	
