<?php
//starts the session of the user
  session_start();
  $errorMessage="";//error message
  if(isset($_POST['SUBMIT'])){//if submit button is clicked
    if(empty($_POST['EMPID'])){//checks to see if the username or password is empty
      $errorMessage ="EMPLOYEE ID MISSING!! TRY AGAIN!!";//prompts user that one of them is empty
    }else{
      $employeeid=trim($_POST['EMPID']);//grabs the usernam
      $employeeid = strip_tags($employeeid);
      $employeeid = htmlspecialchars($employeeid);
      // $password=trim($_POST['PASSWORD']);//grabs the password
      // $password=strip_tags($password);
      // $password=htmlspecialchars($password);
      $mysqli = mysqli_connect("localhost", "root", "", "hms");//checks the connection of the database
      $search = "SELECT * FROM employee WHERE Employee_ID='$employeeid'";//selects from the login table for the username and the password
      $result = $mysqli->query($search);
      $row = $result->fetch_assoc();
      if($result->num_rows==1){//pulls the name from database where there is only one result
        //$name = $row['Fname'];
          //$_SESSION['user'] = $name;
        $_SESSION['user']= $employeeid;//ests the username as the current session
        $type = $row['Employee_Type'];
     //extra for different pages
        if ($type ==1){
          header("location: aboutme.php");//moves to the profile file
        }else if($type ==2){
          header("location: nurse.php");
        }else{
          header("location: receptionist.php");
        }
      //  header("location: aboutme.php");//moves to the profile file
      }else{
        $errorMessage="EMPLOYEE ID INCORRECT!! TRY AGAIN!!";//if there is an error with the login
      }
      mysqli_close($mysqli);

    }
}
 ?>
