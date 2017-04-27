<?php
//includes page that detects if the database is connected
include 'session.php';
$user = $_SESSION['user'];//assigns the current session as the user of the filesystem
$mysqli = mysqli_connect("localhost", "root", "", "hms");//checks the connection of the database
// $items = "SELECT * FROM nurse_has_patient WHERE nurse_employee_ID='$user'";
//     $res = $mysqli->query($items);
//     if($res->num_rows>0){
//        while($row=$res->fetch_assoc()){
//          echo $row['patient_ID']. "<br>";
//       }
//  }
    //    $items= "SELECT P.patient_ID, P.Fname, P.Lname from patient AS P join nurse_has_patient AS NP on NP.patient_ID=P.patient_ID JOIN
    //    employee on employee.employee_ID=NP.nurse_employee_ID where nurse_employee_ID='$user'";
    //   // $items= "SELECT P.patient_ID from patient AS P join nurse_has_patient AS NP on
    //   // P.patient_ID = NP.patient_ID WHERE nurse_employee_ID = 'N3' ";
    //   echo $user;
    //    $res = $mysqli->query($items);
    //      echo "Theres a problem1";
    //    if($res->num_rows> 0){
    //        echo "Theres a problem2";
    //       while($row=$res->fetch_assoc()){
    //         echo  $row['patient_ID']. "<br>";
    //           echo "Theres a problem3";
    //   //       echo "<h3 style='text-align:center;'></h3>";
    // }
    //     }else{
    //       echo "Theres a problem";
    //     }
 ?>

 <html>
 <head>
   <title>Nurse</title>
 </head>
   <body>
     <h1 class="title">Welcome <?php echo $user;?>!</h1>
     <div align="center">
       <?php
       $patients = "SELECT P.patient_ID, P.Fname, P.Lname, P.Minit, P.Weight, P.Height, P.blood_type FROM patient AS P, employee_has_patient AS EP
       where EP.patient_patient_ID = P.patient_ID AND EP.employee_Type = 2
       AND EP.employee_Employee_ID ='$user'";
       echo "<table><caption>MY PATIENTS</caption><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'><col width='130'>";
       echo "<tr><th>Patient ID</th><th>First Name</th><th>Middle Initial</th><th>Last Name</th><th>Weight</th><th>Height</th><th>Blood Type</th></tr>";
       $res = $mysqli->query($patients);
       if($res->num_rows>0){
         while($row=$res->fetch_assoc()){
             echo  "<tr><td>" . $row['patient_ID'] . "</td><td> " .  $row['Fname'] . "</td><td> " . $row['Minit'] . "</td><td> " . $row['Lname'] . "</td><td>". $row['Weight']. "</td><td>" . $row['Height'] . "</td>";
             echo  "<td>" . $row['blood_type'] . "</td></tr> ";
         }
       }else{
           echo "<h2 style='text-align:center;color: #666;'>No patients.</h2>";
         }
         echo "</table";
        ?>
         </div>

     <a href="logout.php">Logout</a>
   </body>
 <style media="screen">
 body{
   color: white;
  background: #B24592;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #F15F79, #B24592);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #F15F79, #B24592); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  text-align: center;
 }
 table, tr, td{
   text-align: center;
   border: 1px solid black;
   font-size: 20px;
 }
 .title{
   color: white;
   text-align: center;
 }

 </style>
 </html>
