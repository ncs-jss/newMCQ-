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
      MCQ Module
    </title>
    <link href='http://fonts.googleapis.com/css?family=Inika:400,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/fonts.js"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <div class="navbar navbar-inverse">
        <div class="navbar navbar-static-top">
          <div class="navbar-inner">
            <nav>
              <a class="brand" id="brand">
                NCS
              </a>
              <?php 
                if(isset($_SESSION['logged']) && $_SESSION['logged'])
                {
                  echo '<ul class="nav">';
                  echo '<li><a href="mcq.php"><i class="icon-tasks icon-white"></i> MCQ</a></li>';
                  echo '</ul>';
                  echo '<a href="logout.php" id="logout-link">
                        <i class="icon-off icon-white"></i> Logout</a>';
                  if($_SESSION['completed']==0&& $_SESSION['id']>0)
                  {  
                    $_SESSION['id']=$_SESSION['id']-1;
                  }  
                }
                else
                {     
                  $_SESSION['signup_error']=' ';
                  $_SESSION['success']=' ';
                  $_SESSION["logging"]=false;
                  $_SESSION["logged"]=false;
                  $_SESSION['id']=1;
                  $_SESSION['correctans']=0;
                  $_SESSION['completed']=0;
                  echo '<ul class="nav">';
                  echo '<li><a href="login.php"><i class="icon-ok-sign icon-white"></i> Login</a></li>';
                  echo '<li><a href="signup.php"><i class="icon-edit icon-white"></i> Sign up</a></li>';
                  echo '<li><a href="admin.php"><i class="icon-cog icon-white"></i> Admin Login</a></li>';
                  echo '</ul>';
                }
              ?>
            </nav>
          </div>
        </div>
      </div>
    </header>  
    <div class="container">
      <div class="leaderboard">
        <div class="hero-unit">
          <h1>
            MCQ Test
          </h1>
          <p class="text-success">By Nibble Computer Society</p>
        </div>
      </div>
      <div class="rulescontainer">
        <h2>
          Rules
        </h2>
        <ul>
          <?php
            include("components/db_connect.php");
            $query="SELECT * FROM time_and_questions";
            $qresult=mysqli_query($con,$query);
            $result=mysqli_fetch_array($qresult);
            echo "<li> Total no of Question is " . $result['no_of_questions'] . ".</li>";
            echo "<li> Time to attempt questions is " . $result['timer'] ." min.</li>"; 
            echo "<li> Signup and Login to begin.</li>";
            echo "<li> Once Logged in test begins and timer starts.</li>";
            $query="SELECT * FROM marking_scheme";
            $qresult=mysqli_query($con,$query);
            $result=mysqli_fetch_array($qresult);
            if($result["negative_marking"]==1)
            {
              echo "<li> There is negative marking</li>";
              echo '<li>-'.$result["negative"].' for every wrong answer</li>';
              echo '<li>+'.$result ["positive"].' for every correct answer</li>';
            }
            else
              echo "<li> There is no negative marking. </li>";
          include("components/db_disconnect.php");
        ?>
        </ul>
      </div>
    </div>
    <?php include("components/footer.html");?>
  </body>
</html>
