<?php
//includes page that detects if the database is connected
include 'session.php';
$user = $_SESSION['user'];//assigns the current session as the user of the filesystem
 ?>
<!--the first page redirected from login-->
 <html>
 <title>Doctor</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

 <body>
   <h1 class="title">Welcome <?php echo $user;?>!</h1>
   <div align="center">
        <?php
        $patients = "SELECT P.patient_ID, P.Fname, P.Lname, P.Minit, P.Weight, P.Height, P.blood_type, P.chief_complaint, P.diagnosis FROM patient AS P, employee_has_patient AS EP
        where EP.patient_patient_ID = P.patient_ID AND EP.employee_Type = 1
        AND EP.employee_Employee_ID ='$user'";
        echo "<table><caption>MY PATIENTS</caption><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'>";
        echo "<tr><th>Patient ID</th><th>First Name</th><th>Middle Initial</th><th>Last Name</th><th>Weight</th><th>Height</th><th>Blood Type</th><th>Complaint</th><th>Diagnosis</th></tr>";
        $res = $mysqli->query($patients);
        if($res->num_rows>0){
          while($row=$res->fetch_assoc()){
              echo  "<tr><td>" . $row['patient_ID'] . "</td><td> " .  $row['Fname'] . "</td><td> " . $row['Minit'] . "</td><td> " . $row['Lname'] . "</td><td>". $row['Weight']. "</td><td>" . $row['Height'] . "</td>";
              echo  "<td>" . $row['blood_type'] . "</td><td>" . $row['chief_complaint'] . "</td><td>". $row['diagnosis'] . "</td></tr><br> ";
          }
        }else{
            echo "<h2 style='text-align:center;color: white;'>No patients.</h2>";
          }
          echo "</table";
         ?>
       </div>

   <a href="logout.php">Logout</a>
 </body>
 <style>

  body{
    text-align: center;
    color: white;
   background: #B24592;  /* fallback for old browsers */
   background: -webkit-linear-gradient(to right, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */
   background: linear-gradient(to right, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }
  table, tr, td{
    text-align: center;
    border: 1px solid black;
    font-size: 20px;

  }
  .title{
    color: white;
  }
 </style>
 </html>
