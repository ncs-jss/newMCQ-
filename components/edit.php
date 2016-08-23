<?php
  session_start();
  include("db_connect.php");
  $_SESSION['statusmsg']='';
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $_SESSION['identity']=$id;
    $query="SELECT * FROM questions WHERE id='$id'";
    $res=mysqli_query($con,$query);
    $result=mysqli_fetch_array($res);
  }
  if(isset($_POST['ans']))
    if($_POST['ans']!=''&& $_POST['ques']!=''&& $_POST['a']!=''&& $_POST['b']!=''&& $_POST['c']!=''&& $_POST['d']!='')
    {
      $x=$_SESSION['identity'];
      $que=addslashes($_POST['ques']);
      $ans=addslashes(strtolower($_POST['ans']));
      $a=addslashes($_POST['a']);
      $b=addslashes($_POST['b']);
      $c=addslashes($_POST['c']);
      $d=addslashes($_POST['d']);
      $query="UPDATE questions SET question='$que',a='$a',b='$b',c='$c',d='$d',ans='$ans' WHERE id='$x'";
      if(mysqli_query($con,$query))
      {
        $_SESSION['statusmsg']="Updated successfully";
      }
      else
        $_SESSION['statusmsg']="Error";
    }
    else
      $_SESSION['statusmsg']="Enter All details";
  include("db_disconnect.php");
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Question</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <div class="navbar navbar-inverse">
      <div class="navbar navbar-static-top">
        <div class="navbar-inner">
          <a class="brand" id="brand">
            NCS
          </a>            
          <ul class="nav">
          <li><a href="mcqqueslist.php">
          <i class="icon-tasks icon-white"></i> List</a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
    <?php
      if(isset($_SESSION['identity']))
      {
        include('db_connect.php');
        $x=$_SESSION['identity'];
        $query="SELECT * FROM questions WHERE id='$x'";
        $res=mysqli_query($con,$query);
        $result=mysqli_fetch_array($res);
        include('db_disconnect.php');
      }
    ?>
    <h1>Edit Question</h1>
      <form method="POST" action="edit.php" class="form-horizontal">
        <h3>Id = <?php echo $result['id'];?></h3>
        <h3>Quesiton</h3>
        <textarea name="ques"rows="10"><?php echo $result['question'];?></textarea>
        <h3>A</h3>
        <textarea name="a"rows="5" ><?php echo $result['a'];?></textarea>
        <h3>B</h3>
        <textarea name="b"rows="5" ><?php echo $result['b'];?></textarea>
        <h3>C</h3>
        <textarea name="c"rows="5" ><?php echo $result['c'];?></textarea>
        <h3>D</h3>
        <textarea name="d"rows="5" ><?php echo $result['d'];?></textarea>
        <h3>Answer</h3>
        <textarea name="ans"rows="5" ><?php echo $result['ans'];?></textarea>
        <input type="submit" class="btn btn-large btn-inverse changebtn"name="Change" value="Change"/>
      </form>
      <p><?php if($_SESSION['statusmsg']!='') echo $_SESSION['statusmsg'];?></p>
    </div>
    <?php include("footer.html");?>
</body>
</html>	