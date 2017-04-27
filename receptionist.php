<?php
//includes page that detects if the database is connected
include 'session.php';
$user = $_SESSION['user'];//assigns the current session as the user of the filesystem
$errorMessage=" ";//error message
$errorMessage2 = " ";
$errorMessage3 = " ";
$mysqli = mysqli_connect("localhost", "root", "", "hms");//checks the connection of the database

//this is if they submit information of a patient
if (isset($_POST['SUBMIT'])) {//grabs the information when form submitted
  if(empty($_POST['patient_id']) || empty($_POST['first_name'])|| empty($_POST['last_name']) ){//checks to see if the username or password is empty
    $errorMessage ="SOME/ALL PATIENT INFORMATION MISSING!! TRY AGAIN!!";//prompts user that one of them is empty
  }else{
    $patientid = trim($_POST['patient_id']);
    $first_name=trim($_POST['first_name']);//grabs the usernam
    $middle_initial = trim($_POST['middle_initial']);
    $last_name = trim($_POST['last_name']);
    $patientid = strip_tags($patientid);
    $first_name= strip_tags($first_name);//grabs the usernam
    $middle_initial = strip_tags($middle_initial);
    $last_name = strip_tags($last_name);
    $patientid = htmlspecialchars($patientid);
    $first_name= htmlspecialchars($first_name);//grabs the usernam
    $middle_initial = htmlspecialchars($middle_initial);
    $last_name = htmlspecialchars($last_name);
    $newpatientid = mysqli_real_escape_string($mysqli, $_POST['patient_id']);
    $newfirstname = mysqli_real_escape_string($mysqli, $_POST['first_name']);
    $newmiddleinitial = mysqli_real_escape_string($mysqli, $_POST['middle_initial']);
    $newlastname = mysqli_real_escape_string($mysqli, $_POST['last_name']);
    $newpatient = "INSERT INTO patient(patient_ID, Fname, Minit, Lname) VALUES ('$newpatientid', '$newfirstname', '$newmiddleinitial', '$newlastname')";
    if (mysqli_query($mysqli, $newpatient)) {
        echo "<h1 style='text-align:center;'>Patient record added successfully</h1>";
    } else {
       echo "<h1 style='text-align:center;'>Error adding patient record:</h1> " . mysqli_error($mysqli);
    }
  }
}

//this is for submitting information of an employee
if (isset($_POST['INSERTEMP'])) {//grabs the information when form submitted
  if(empty($_POST['emp_id']) || empty($_POST['emp_type'])|| empty($_POST['emp_first_name']) || empty($_POST['emp_last_name']) ){//checks to see if the username or password is empty
    $errorMessage2 ="SOME/ALL EMPLOYEE INFORMATION MISSING!! TRY AGAIN!!";//prompts user that one of them is empty
  }else{
    $emp_id = trim($_POST['emp_id']);
    $emp_first_name=trim($_POST['emp_first_name']);//grabs the usernam
    $emp_type = trim($_POST['emp_type']);
    $emp_last_name = trim($_POST['emp_last_name']);
    $emp_id = strip_tags($emp_id);
    $emp_first_name= strip_tags($emp_first_name);//grabs the usernam
    $emp_type = strip_tags($emp_type);
    $emp_last_name = strip_tags($emp_last_name);
    $emp_id = htmlspecialchars($emp_id);
    $emp_first_name= htmlspecialchars($emp_first_name);//grabs the usernam
    $emp_type = htmlspecialchars($emp_type);
    $emp_last_name = htmlspecialchars($emp_last_name);
    $new_emp_id = mysqli_real_escape_string($mysqli, $_POST['emp_id']);
    $new_emp_first_name = mysqli_real_escape_string($mysqli, $_POST['emp_first_name']);
    $new_emp_type = mysqli_real_escape_string($mysqli, $_POST['emp_type']);
    $new_emp_last_name = mysqli_real_escape_string($mysqli, $_POST['emp_last_name']);
    $newemp = "INSERT INTO employee(Employee_ID, Employee_Type, FName, LName) VALUES('$new_emp_id', '$new_emp_type', '$new_emp_first_name', '$new_emp_last_name')";
    if (mysqli_query($mysqli, $newemp)) {
        echo "<h1 style='text-align:center;'>Employee record added successfully</h1>";
    } else {
       echo "<h1 style='text-align:center;'>Error adding employee record:</h1> " . mysqli_error($mysqli);
    }
  }
}
//deleting an employee
if (isset($_POST['DELETEEMP'])) {//grabs the information when form submitted
  if(empty($_POST['demp_id'])){//checks to see if the username or password is empty
    $errorMessage2 ="CANNOT DELETE! EMPLOYEE INFORMATION MISSING!! TRY AGAIN!!";//prompts user that one of them is empty
  }else{
    $emp_id = trim($_POST['demp_id']);
    $emp_id = strip_tags($emp_id);
    $emp_id = htmlspecialchars($emp_id);
    $new_emp_id = mysqli_real_escape_string($mysqli, $_POST['demp_id']);
    $sql = "DELETE from employee where Employee_ID='$new_emp_id'";
    if (mysqli_query($mysqli, $sql)) {
        echo "<h1 style='text-align:center;'>Record deleted successfully</h1>";
    } else {
       echo "<h1 style='text-align:center;'>Error deleting record:</h1> " . mysqli_error($mysqli);
    }
  }
}
//updating an employee
if (isset($_POST['UPDATEEMP'])) {//grabs the information when form submitted
  if(empty($_POST['nemp_id']) || empty($_POST['nemp_first_name']) || empty($_POST['nemp_last_name']) ){//checks to see if the username or password is empty
    $errorMessage3 ="SOME/ALL EMPLOYEE INFORMATION MISSING TO UPDATE!! TRY AGAIN!!";//prompts user that one of them is empty
  }else{
    $nemp_id = trim($_POST['nemp_id']);
    $nemp_first_name=trim($_POST['nemp_first_name']);//grabs the usernam
    $nemp_last_name = trim($_POST['emp_last_name']);
    $nemp_id = strip_tags($nemp_id);
    $nemp_first_name= strip_tags($nemp_first_name);//grabs the usernam
    $nemp_last_name = strip_tags($nemp_last_name);
    $nemp_id = htmlspecialchars($nemp_id);
    $nemp_first_name= htmlspecialchars($nemp_first_name);//grabs the usernam
    $nemp_last_name = htmlspecialchars($nemp_last_name);
    $nnew_emp_id = mysqli_real_escape_string($mysqli, $_POST['nemp_id']);
    $nnew_emp_first_name = mysqli_real_escape_string($mysqli, $_POST['nemp_first_name']);
    $nnew_emp_last_name = mysqli_real_escape_string($mysqli, $_POST['nemp_last_name']);

    $upemp = "UPDATE employee SET FName = '$nnew_emp_first_name', LName = '$nnew_emp_last_name' WHERE Employee_ID = '$nnew_emp_id'";
    if (mysqli_query($mysqli, $upemp)) {
        echo "<h1 style='text-align:center;'>Record updated successfully</h1>";
    } else {
       echo "<h1 style='text-align:center;'>Error updating record:</h1> " . mysqli_error($mysqli);
    }
  }
}
 ?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<title>Receptionist</title>
</style>
</head>
<body>
	<div class="wrapper">
    <!--introduction to the AboutME-->

	<div class="title">
		<h1 style= "text-align:center;">Welcome,</span> <?php echo $login_session; ?>!</h1>
      <a href="logout.php">Logout</a>
  </div>

     <div id="newmasonry" style=" display:inline-block; width:500px;float:left;">
       <div id="new" style="background-color:pink;">
         <h2 style="text-align:center;">PATIENT INFORMATION</h2>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>"   method="POST">
           <p>
             <label for="patientid">Patient ID: </label>
             <input id="patientid" name="patient_id" placeholder="Enter patient id:" type="text"><br>
           </p>
           <p>
             <label for="firstname">First Name: </label>
             <input id="firstname" name="first_name" placeholder="Enter patient first name:" type="text"><br>
           </p>
           <p>
             <label for="middleinitial">Name: </label>
             <input id="middleinitial" name="middle_initial" placeholder="Enter patient middle initial:" type="text"><br>
           </p>
           <p>
             <label for="lastname">Last Name: </label>
             <input id="lastname" name="last_name" placeholder="Enter patient last name:" type="text"><br>
           </p>
           <p><!--the submit button that will transmit the username and password to the login.php-->
             <input type="submit" name="SUBMIT" value="    Add Patient Information    ">
           </p>
           <?php echo $errorMessage; ?>
         </form>

       </div>

    </div>
<!--for employees-->
     <div id="newmasonry" style="display:inline;">
       <div id="new2" style=" display:inline; background-color:pink;">
          <h2 style="text-align:center;">EMPLOYEE INFORMATION</h2>
         <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST">
           <p>
             <label for="employeeid">Employee ID: </label>
             <input id="employeeid" name="emp_id" placeholder="Enter employee id:" type="text"><br>
           </p>
           <p>
             <label for="employeetype">Employee Type: </label>
             <input id="employeetype" name="emp_type" placeholder="Enter employee type:" type="text"><br>
           </p>
           <p>
             <label for="empfirstname">Employee First Name: </label>
             <input id="empfirstname" name="emp_first_name" placeholder="Enter employee first name:" type="text"><br>
           </p>
           <p>
             <label for="emplastname">Employee Last Name: </label>
             <input id="emplastname" name="emp_last_name" placeholder="Enter employee last name:" type="text"><br>
           </p>
           <p><!--the submit button that will transmit the username and password to the login.php-->
             <input type="submit" name="INSERTEMP" value="   Insert Employee Information    ">
           </p><br>
           <p>
             <label for="employeeid">Employee ID: </label>
             <input id="employeeid" name="nemp_id" placeholder="Enter employee id:" type="text"><br>
           </p>
           <p>
             <label for="empnfirstname">Employee First Name: </label>
             <input id="empnfirstname" name="nemp_first_name" placeholder="Enter new first name:" type="text"><br>
           </p>
           <p>
             <label for="empnlastname">Employee Last Name: </label>
             <input id="empnlastname" name="nemp_last_name" placeholder="Enter new last name:" type="text"><br>
           </p>
           <p>
             <input type="submit" name="UPDATEEMP" value="   Update Employee Information    ">
           </p><br>
           <p>
             <label for="employeeid2">Employee ID: </label>
             <input id="employeeid2" name="demp_id" placeholder="Enter employee id:" type="text"><br>
           </p>
           <p><!--the submit button that will transmit the username and password to the login.php-->
             <input type="submit" name="DELETEEMP" value="   Delete Employee Information    ">
           </p>
         </form>
       </div>
     </div>
     <hr style="width:100%;">
   <?php
   $patients = "SELECT patient_ID, Fname, Lname, Minit FROM patient";
   echo "<div style=' width:40%; float:left; padding:20px;'><table><caption>PATIENT TABLE</caption><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><tr><th>Patient ID</th><th>First Name</th><th>Middle Initial</th><th>Last Name</th></tr>";
   $res = $mysqli->query($patients);
   if($res->num_rows>0){
     while($row=$res->fetch_assoc()){
         echo  "<tr><td>" . $row['patient_ID'] . "</td><td> " .  $row['Fname'] . "</td><td> " . $row['Minit'] . "</td><td> " . $row['Lname'] . "</td></tr> ";
     }
   }else{
       echo "<h2 style='text-align:center;color: #666;'>No patients.</h2>";
     }
     echo "</table></div>";

   $employees = "SELECT Employee_ID, Employee_Type, FName, LName FROM employee";
   echo "<div style='display:inlne; width:40%; float:right; padding:20px;margin:20px;'><table> <caption>EMPLOYEE TABLE</caption><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><tr><th>Employee ID</th><th>Employee Type</th><th>Employee First Name</th><th>Employee Last Name</th></tr>";
   $res = $mysqli->query($employees);
   if($res->num_rows>0){
     while($row=$res->fetch_assoc()){
         echo  "<tr><td>" . $row['Employee_ID'] . "</td><td> " .  $row['Employee_Type'] . "</td><td> " . $row['FName'] . "</td><td> " . $row['LName'] . "</td></tr>";
     }
   }else{
       echo "<h2 style='text-align:center;color: #666;'>No patients.</h2>";
     }
     echo "</table></div>";


    ?>
   </div>

<style>
#newmasonry{ text-align:center;}
input[type="text"] {width: 250px;}
#new{ padding:10px;border-radius: 3px;  margin:auto;  width: 100%;}
#new input{  width:100%;  clear:both;}
#new2 input{  width:100%;clear:both;}
#new2{  padding:10px;border-radius: 3px; margin:auto; width: 50%;  float:right;}
table, tr, td{border: 1px solid black;margin: 0px;}
td{width:40px;}
.title{text-align:center; color:white;}
body {color: white;background: #B24592;  /* fallback for old browsers */ background: -webkit-linear-gradient(to right, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */ background: linear-gradient(to right, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */}
</style>
</body>
</html>
<!--http://w3bits.com/demo/css-masonry/-->
