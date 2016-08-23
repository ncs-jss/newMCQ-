<?php
session_start();
include("components/mcqstate.php");
if(!$result['mcq_state'])
  {
    $_SESSION['message']="MCQ Disabled by Administrator";
    header("location:admin.php");
  }
$_SESSION['id']=$_SESSION['no_of_ques']+7;
$_SESSION['completed']=1;
echo '<script>self.location="mcq.php"</script>';

