<?php
    session_start();
    include("components/mcqstate.php");
    if(!$result['mcq_state'])
      {
        $_SESSION['message']="MCQ Disabled by Administrator";
        header("location:admin.php");
      }
?>
<!DOCTYPE html >
<html  lang="en">
  <head>
    <meta charset="utf-8">
      <title>
        Signup
      </title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css">
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
                <i class="icon-home icon-white"></i> HOME
              </a>
            </li>
          </ul>  
        </div>
      </div>
    </div>
    <div class="container" id="content">
      <div class="container" id="signform">
        <form action="register.php"  method="POST" class="form-horizontal" name="signupform">
          <legend> 
            Sign Up 
          </legend>  
          <div class="control-group">
            <label class="control-label" for="firstname">Name</label> 
            <div class="controls"><input id="firstname" type="text" name="f_name" Autofocus/>
            </div>
          </div>
          <div class="control-group"> 	
            <label class="control-label" for="branchyear">Branch</label>
            <div class="controls"><input id="branchyear" type="text" name="branch" placeholder="Eg. CS1" />
            </div>
          </div>
          <div class="control-group">   
            <label class="control-label" for="year">Year</label>
            <div class="controls">
              <select name="year">
              <option value=1>1</option>
              <option value=2>2</option>
              <option value=3>3</option>
              <option value=4>4</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <label class="radio"><input type="radio" name="gndr" value="Male">Male</label>
              <label class="radio"><input type="radio" name="gndr" value="Female">Female </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email">Email ID </label>
              <div class="controls"><input id="email" type="text" name="email"/>
              </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Password </label>
            <div class="controls"><input id="password" type="password" name="pass" />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="rpassword">Retype password </label>
            <div class="controls"><input id="rpassword" type="password" name="rpass" />
            </div>
          </div>
          <div class="control-group">	
            <div class="controls"><input class="btn btn-success btn-large" id="signinbutton" type="submit" value="Sign Up"\>
            </div>
          </div>
        </form>
        <?php 
          if($_SESSION['signup_error']!=' ')
          {
            echo ' <div class="alert alert-error">';
            echo '<strong>Error..! </strong>' . $_SESSION['signup_error'];
            echo '</div>'; 
          }
          ?>
      </div>  
    </div> 
    <?php include("components/footer.html");?>
	</body>	
</html>	                
