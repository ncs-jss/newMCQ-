<?php session_start() ?>
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
          <li><a href="../admin.php">
          <i class="icon-cog icon-white"></i> Admin</a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
    	<table class="table table-striped">
    		<?php
    			include('db_connect.php');
    			$query="SELECT * FROM questions";
    			$res=mysqli_query($con,$query);
    			while($result=mysqli_fetch_array($res))
    			{
    				echo '<tr>';
            echo '<td>'.$result['id'].'</td>';
            echo '<td>'.nl2br(htmlspecialchars($result['question'])).'</td>';
            echo '<td>'.nl2br($result['a']).'</td>';
            echo '<td>'.nl2br($result['b']).'</td>';
            echo '<td>'.nl2br($result['c']).'</td>';
            echo '<td>'.nl2br($result['d']).'</td>';
            echo '<td>'.$result['ans'].'</td>';
            $r=$result['id'];
            echo "<td><a href='edit.php?id=$r'>Edit</a></td>";
    			}
    			include('db_disconnect.php');
    		?>
    	</table>
    </div>
    <?php include("footer.html");?>
</body>
</html>	