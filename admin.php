<?php 
  session_start();
  if(isset($_GET['logout']))
    if($_GET['logout'])
      {
        unset($_SESSION['adminlogin']);
        session_destroy();
      }
  $message='';        
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Administrator
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/adminstyle.css" rel="stylesheet">
    <script src="js/admin.js" type="text/javascript"></script>
  </head>
  <body>
  <?php
    if(isset($_POST['username'])&&isset($_POST['pass']))
      if($_POST['username']!=''&&$_POST['pass']!='')
        {
          include("components/db_connect.php");
          $username=mysqli_real_escape_string($con,trim($_POST['username']));
          $password=md5(mysqli_real_escape_string($con,trim($_POST['pass'])));
          $query="SELECT * FROM admin_login WHERE username='$username'";
          $res=mysqli_query($con,$query);
          $result=mysqli_fetch_array($res);
          if($result['password']==$password)
          {
            $_SESSION['adminlogin']=true;
          }
          else
            $message="Please enter correct username and password";
        }
      else
        $message="Enter all details";
  ?>
    <div class="navbar navbar-inverse">
      <div class="navbar navbar-static-top">
        <div class="navbar-inner">
          <a class="brand" id="brand">
            NCS
          </a>            
          <?php
          if(isset($_SESSION['adminlogin']))
          {
            if($_SESSION['adminlogin'])
              echo '<a href="admin.php?logout=1" id="logout-link">
              <i class="icon-off icon-white"></i> Logout Admin</a>';
          }
          else
          {
            echo '<ul class="nav">';  
            echo '<li><a href="home.php"><i class="icon-home icon-white"></i> HOME</a></li>';
            echo '</ul>';
          }
          ?>          
        </div>
      </div>
    </div>
    <div class="container">
    <section>
      <?php
        if(isset($_SESSION['adminlogin']))
        {
          if($_SESSION['adminlogin'])
          {
            echo '<h1>Administrator Panel</h1>';
            echo '<div class="endbmcq">';
            include("components/mcqstate.php");
            if($result['mcq_state'])
            {
              echo '<div class="alert alert-error">';
              echo '<p class="pull-left"><strong>Disable</strong> MCQ Test</p>';
              echo '<div id="button">';
            ?>
              <input type="submit" onclick="self.location='components/adminprocess.php?make=0'" name="dis" class="btn btn-danger btn-large" value="Disable">
            <?php  
              echo '</div>';
              echo '</div>';           
            }
            else
            {
              echo '<div class="alert alert-success">';
              echo '<p class="pull-left"><strong>Enable</strong> MCQ Test</p>';
              echo '<div id="button">';
            ?>  
              <input type="submit" onclick="self.location='components/adminprocess.php?make=1'" name="en" class="btn btn-success btn-large" value="Enable">
            <?php  
              echo '</div>';
              echo '</div>';
              echo '</div>';               
            }
            include("components/db_connect.php");
            echo '<div class="view_score">';
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr><td>View Scores</td></tr>
                  </thead>
                  <tbody>  
                    <tr>
                      <td><div class="alert alert-success">View Score</div></td>'; 
                        ?>
                      <td></td>
                      <td><input type="submit" class="btn btn-inverse align" onclick='window.location="components/viewscore.php";' value="View"></td>                      
                    <?php echo '</tr>
                  </tbody>';
            echo '</table>';
            echo ' </div>';               
            $query="SELECT * FROM marking_scheme";
            $res=mysqli_query($con,$query);
            $result=mysqli_fetch_array($res);
            echo '<div class="mcqmarking">';
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr><td>Mcq Marking</td></tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Negative marking</td>
                      <td id="neg_pos_status">';
                      if($result['negative_marking']) 
                              echo 'On ';
                            else
                              echo 'Off ';
                      echo '</td>
                      <td>    
                      <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                      <label class="onoffswitch-label" for="myonoffswitch">
                      <div class="onoffswitch-inner"></div>
                      <div class="onoffswitch-switch"></div>
                      </label>
                      </div></td>';?>
                      <td><input type="submit" class="btn btn-inverse" onclick="request('myonoffswitch')" value="Change"></td>
                    <?php echo '</tr>
                    <tr>
                      <td> Correct answer mark</td>
                      <td id="pos_value">'.$result['positive'].'</td>
                      <td> Wrong answer mark</td>
                      <td id="neg_value">'.$result['negative'].'</td>
                    </tr>
                    <tr>
                      <td><input type="number" class="input-block-level" min="0" max="100" id="posmarks" name="posmark"></td>';?>
                      <td><input type="submit" class="btn btn-inverse align2" onclick="request('posmarks')" value="Change"></td>
                      <td><input type="number" class="input-block-level" min="0" max="100" id="negmarks" name="negmark"></td>
                      <td><input type="submit" class="btn btn-inverse align2" onclick="request('negmarks')" value="Change"></td>                        
                    <?php echo '</tr>
                  </tbody>';
            echo '</table>';
            echo ' </div>';
            $query="SELECT * FROM time_and_questions";
            $res=mysqli_query($con,$query);
            $result=mysqli_fetch_array($res);            
            echo '<div class="time_question">';
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr><td>Mcq Time and number of Questions</td></tr>
                  </thead>
                  <tbody>  
                    <tr>
                      <td> Timer (mins)</td>
                      <td id="time">'.$result['timer'].'</td>
                      <td> Number of questions To display</td>
                      <td id="ques_count">'.$result['no_of_questions'].'</td>
                    </tr>
                    <tr>
                      <td><input type="number" class="input-block-level" min="1" max="600" id ="timer" name="timer"></td>';?>
                      <td><input type="submit" class="btn btn-inverse align2" onclick="request('timer')" value="Change"></td>
                      <td><input type="number" class="input-block-level" id="no_of_ques" name="no_of_ques"></td>
                      <td><input type="submit" class="btn btn-inverse align2" onclick="request('no_of_ques')" value="Change"></td>                        
                   <?php echo '</tr>
                  </tbody>';
            echo '</table>';
            echo ' </div>';
            $query="SELECT * FROM questions";
            $res=mysqli_prepare($con,$query);
            mysqli_stmt_execute($res);
            mysqli_stmt_store_result($res);
            $result=mysqli_stmt_num_rows($res);             
            echo '<div class="insert_question">';
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr><td>Insert Questions in database</td></tr>
                  </thead>
                  <tbody>  
                    <tr>
                      <td>Total no of questions in database</td>
                      <td>'.$result.'</td>';?>
                      <td><input type="submit" class="btn btn-inverse align2" onclick='window.location="components/enter.php"' value="Insert"></td>
                      <td><input type="submit" class="btn btn-inverse align2" onclick='window.location="components/mcqqueslist.php"' value="Edit"></td>                      
                    <?php echo '</tr>
                  </tbody>';
            echo '</table>';
            echo ' </div>';
            echo '<div class="delete_question">';
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr><td>Delete All questions</td></tr>
                  </thead>
                  <tbody>  
                    <tr>
                      <td>Delete All questions from table</td>
                      <td id="del_quesmsg"></td>';?>
                      <td><input type="submit" class="btn btn-inverse align2" onclick="request('delques')" value="Delete"></td>
                    <?php echo '</tr>
                  </tbody>';
            echo '</table>';
            echo ' </div>';                                        
           }
        }
        else
        { 
      ?>      
      <form action="admin.php" method="POST" class="form-signin" name="loginform">
        <h2 class="form-signin-heading">Admin Login</h2>
        <input type="text" active class="input-block-level" name="username" placeholder="Username" Autofocus/>
        <input class="input-block-level" type="password" name="pass" placeholder="Password" />
        <input type="submit" class="btn btn-large btn-primary" value="Login" />
        <?php
          if($message!='')  
          {
            echo '<div class="alert alert-error">';
            echo '<strong>Error..! </strong>' . $message . '';
            echo '</div>';
          }
          if(isset($_SESSION['message']))  
          {
            echo '<div class="alert alert-error">';
            echo '<strong>Error..! </strong>' . $_SESSION['message'] . '';
            echo '</div>';
            unset($_SESSION['message']);
          }          
        ?>          
      </form>
      <?php } ?>
    </section>
    </div>   
    <?php include("components/footer.html");?>
  </body> 
</html>                 
