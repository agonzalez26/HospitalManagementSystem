<?php
  //information of the login.php file
  include 'login.php';
  // if(isset($_SESSION['user'])){//if there is a current user then head to the profile.php file
  //   header("aboutme.php");
  // }
//  $user = $_SESSION['user'];
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css"><!--access to the style.css file-->
    <title>Login</title>
  </head>
  <body>
    <div id="main" align="center"><!--displays at the top of the page-->
      <h1>Hospital Management System</h1>
      <div id="login" align="center">
        <!--form for the user to login to the filemanagement system-->
        <form action="" method="POST">
          <p><!--area for the user-->
            <label for="employeeid">Name: </label><br>
            <input id="employeeid" name="EMPID" placeholder="Employee ID" type="text"><br>
          </p>
          <!--<p>area for the password
            <label for="pass">Password: </label><br>
            <input id="pass" name="PASSWORD" placeholder="Password" type="password"><br>
          </p>-->
          <p><!--the submit button that will transmit the username and password to the login.php-->
            <input type="submit" name="SUBMIT" value="    LOGIN    ">
          </p>
          <!--displays if there is an error-->
          <span style="color:red;"><?php echo $errorMessage; ?></span>
        </form>
      </div>
      <!-- <div>
        <h2>New User?</h2>
        <a href="signup.php">Signup Here!</a>
      </div> -->
  </body>
  <!--styling of the index.php file-->
  <style>
body {color: white;background: #B24592;  /* fallback for old browsers */ background: -webkit-linear-gradient(to right, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */ background: linear-gradient(to right, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */}

  #main{
    text-align: center;
  }
  #login{
    background-color: pink;
    padding:20px;
    border-radius: 8px;
    width:50%;
    margin-left: 24%;
  }
  label{
    text-transform: uppercase;
    font-weight: bolder;
  }
  p{
    border-radius: 7px;
    padding:10px;
  }
  input[type=text], input[type=password]{
    text-align: center;
    padding:5px;
    border-radius: 3px;
  }
  </style>
</html>
