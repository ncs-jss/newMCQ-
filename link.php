<?php
session_start();
include("components/mcqstate.php");
if(isset($_SESSION['mcqdone']))
	{
		if($_SESSION['mcqdone'])
		header("location:mcq.php");
	}
if(!$result['mcq_state'])
  {
    $_SESSION['message']="MCQ Disabled by Administrator";
    header("location:admin.php");
 }
if($_GET['question']==-99)
{
	if($_SESSION['id']==1)
		$_SESSION['id']--;
	else
		$_SESSION['id']=$_SESSION['id']-2;
}
else
{
	$_SESSION['id']=$_GET['question'];
}
echo '<script>self.location="mcq.php"</script>';
?>