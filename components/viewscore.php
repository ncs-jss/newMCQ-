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
      <?php
        include("db_connect.php");
        $query="SELECT * FROM details ORDER BY score";
        $res=mysqli_query($con,$query);
        echo '<table class="table table-striped">';
        echo '<tr>
                <th>S No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Year</th>
                <th>Score</th>
              </tr>';
        while($result=mysqli_fetch_array($res))
        {
          echo '<tr><td>'.$result['Number'].'</td>';
          echo '<td>'.nl2br($result['name']).'</td>';
          echo '<td>'.nl2br($result['email']).'</td>';
          echo '<td>'.nl2br($result['branch']).'</td>';
          echo '<td>'.nl2br($result['Year']).'</td>';
          echo '<td>'.nl2br($result['score']).'</td></tr>';;     
        }
        echo '</table>';
        include("db_disconnect.php");
      ?>
    </div>
   <?php include("footer.html");?> 
</body>
</html> 