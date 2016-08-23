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
		<title>
			Login
		</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar navbar-static-top">
				<div class="navbar-inner">
					<a class="brand" id="brand">
						NCS
					</a>
					<ul class="nav">
						<li>
							<a href="home.php">
							<i class="icon-home icon-white"></i> 
								HOME
							</a>
						</li>
						<li>
							<a href="signup.php">
							<i class="icon-edit icon-white"></i> 
								SignUp
							</a>
						</li>
					</ul>  
				</div>
			</div>
		</div>
		<div class="container">
			<form action="login.php" method="POST" class="form-signin" name="loginform">
			<?php
				if($_SESSION["logging"] && $_SESSION["logged"])
				{
					content();
				}
				else
				{
					if(!$_SESSION["logging"])
					{
						$_SESSION["logging"]=true;
						loginform();
					}
					else if($_SESSION["logging"])
					{
						$no_of_rows=checkrows();
						if($no_of_rows==1)
						{
							$_SESSION["logged"]=true;
							content();
						}
						else
						{
							loginform();
							$_SESSION['success']=' ';
							echo '<div class="alert alert-error">
							<strong>Error !</strong> Please try again with correct details.</div>';
						}
					}
				}
				function loginform()
				{
					echo '<h2 class="form-signin-heading">Sign in </h2>';
					echo '<input type="text" active class="input-block-level" name="email" placeholder="Email address" Autofocus/>';
					echo '<input class="input-block-level" type="password" name="pass" placeholder="Password" />';
					echo '<input type="submit" class="btn btn-large btn-primary" value="Login" />';
				}
				function checkrows()
				{
					include("components/db_connect.php");
					if(!empty($_POST))
					{	
						$username=mysqli_real_escape_string($con,trim($_POST['email']));
						$password=md5(mysqli_real_escape_string($con,trim($_POST['pass'])));
					}
					$x="SELECT * FROM details WHERE email='$username' and password='$password'";
					$result=mysqli_prepare($con,$x);
					mysqli_stmt_execute($result);
					mysqli_stmt_store_result($result);
					$y =  mysqli_stmt_num_rows($result);
					$_SESSION['username']=$username;
					return $y;
				}
				function content()
				{
					include("components/db_connect.php");
					$username=$_SESSION['username'];
					$query="SELECT * FROM details WHERE email ='$username'";
					$result=mysqli_query($con,$query);
					$value=mysqli_fetch_array($result);
					$_SESSION['name']=$value['name'];
					$logout_status=$value['Logout_status'];
					$query="SELECT * FROM time_and_questions WHERE serial_num='1'";
					$result=mysqli_query($con,$query);
					$value=mysqli_fetch_array($result);
					setcookie("timer",$value['timer'],time()+3600*24);
					$_SESSION['no_of_ques']=$value['no_of_questions'];
					$query="SELECT * FROM questions";
					$result=mysqli_prepare($con,$query);
					mysqli_stmt_execute($result);
					mysqli_stmt_store_result($result);
					$value= mysqli_stmt_num_rows($result);
					$_SESSION['arr']=range(1,$value);
					shuffle($_SESSION['arr']);
					$_SESSION['completed']=0;
					$_SESSION['id']=0;
					$_SESSION['ansarray']=array();
					$_SESSION['actualans']=array();
					$_SESSION['ques_id']=array();
					include("components/db_disconnect.php");
					if($logout_status)
					{
						echo "<script>self.location='resume.php?logout_stat=1&us=$username'</script>";
					}
					else
					{
						echo '<script>self.location="resume.php?logout_stat=0"</script>';
					}	
				}
				if($_SESSION['success']!=' ')
				{	
					echo '<div class="alert alert-success">';
					echo '<strong>Success..! </strong>' . $_SESSION['success'] . '';
					echo '</div>';
				}
			?>
			</form>
		</div>	
		<?php include("components/footer.html");?>
	</body>	
</html>	                
