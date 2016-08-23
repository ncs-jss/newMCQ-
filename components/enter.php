<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Enter Questions</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<script type="text/javascript">

	function validate(obj)
	{
		var q=document.form1.que.value;
		var opt1=document.form1.opt1.value;
		var opt2=document.form1.opt2.value;
		var opt3=document.form1.opt3.value;
		var opt4=document.form1.opt4.value;
		var ans=document.form1.ans.value;
			if(q==""||opt1==""||opt2==""||opt3==""||opt4==""||ans=="")
			{
				alert("Fill in all the Entries");
				return false;
			}
			return true;
	}
</script>
</head>
<?php 
	$_SESSION['msg']='';
	if ($_POST)
	{
		$q=addslashes($_POST['que']);
		$a=addslashes($_POST['opt1']);
		$b=addslashes($_POST['opt2']);
		$c=addslashes($_POST['opt3']);
		$d=addslashes($_POST['opt4']);
		$ans=addslashes(strtolower($_POST['ans']));
		include("db_connect.php");
		$query= mysqli_query($con,"insert into questions (question,a,b,c,d,ans) values ('$q','$a','$b','$c','$d','$ans')");
			if($query)
			{
				$_SESSION['msg']="Questions successfully added";
			}
			else
			{
				$_SESSION['msg']="Please re-enter";
			}
			include("db_disconnect.php");
	}
?>
<body>
    <div class="navbar navbar-inverse">
      <div class="navbar navbar-static-top">
        <div class="navbar-inner">
          <a class="brand" id="brand">
            NCS
          </a>            
          <ul class="nav">
          <li><a href="../admin.php">
          <i class="icon-cog icon-white"></i> Admin</a>
          </li>
          </ul>
        </div>
      </div>
    </div>
	<div class="container">
	<h1>ENTER QUESTIONS AND ANSWERS</h1>
	<?php
		if(isset($_SESSION['msg']))
			if($_SESSION['msg']!='')
			{
				echo '<div class="alert alert-success done">';
				echo $_SESSION['msg'];
				echo '</div>';
			}
	?>
	<FORM  name="form1" ACTION="enter.php" METHOD="POST" onSubmit="return validate()" class="form-horizontal">
		<h3>QUE:</h3>
		<TEXTAREA NAME="que" ROWS=10 align="centre"></TEXTAREA>
		<h3>OPTION A</h3>
		<TEXTAREA NAME="opt1" ROWS=5></TEXTAREA>
		<h3>OPTION B</h3>
		<TEXTAREA NAME="opt2" ROWS=5></TEXTAREA>
		<h3>
		OPTION C
		</h3>
		<TEXTAREA NAME="opt3" ROWS=5></TEXTAREA>
		<h3>
		OPTION D
		</h3>
		<TEXTAREA NAME="opt4" ROWS=5></TEXTAREA>
		<h3>
		ANSWER
		</h3>
		<input type="text" NAME="ans" value=""/>
		<INPUT TYPE="submit" class = "btn btn-large btn-inverse changebtn" name="Submit" VALUE="submit"></INPUT>
	</FORM>
	</div>
	<?php include("footer.html");?>
</body>
</html>