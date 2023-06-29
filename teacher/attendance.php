<?php 
session_start();
include "connect.php";
$sql = "SELECT * FROM students";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">AMS</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="index.php">Home</a></li>
      <li><a href="viewinfo.php">View Info</a></li>
      <li><a href="attendance.php">Attendance</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
    <div class="container">

        <h2>Student Details:</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Department Name</th>

        <th>Batch</th>

        <th>Email</th>

        <th>Status</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                  $_stid=$row['st_id'];
        ?>
        <form method="get">

                    <tr>

                    <td><?php echo $row['st_id']; ?></td>

                    <td><?php echo $row['st_name']; ?></td>

                    <td><?php echo $row['st_dept']; ?></td>

                    <td><?php echo $row['st_batch']; ?></td>

                    <td><?php echo $row['st_email']; ?></td>

                    <td><select id="stat" name="stat" >
                      <option >Present</option>
                      <option>Absent</option>
                    </select></td>
                    <td><input type=submit class="btn btn-info" value="Submit"></td>

                    </tr>   
          </form>                     

        <?php       }

            }
            
        ?>  
        
        <?php
        $con=mysqli_connect('localhost','root','');
        mysqli_select_db($con,'attsystem');
        
        
        $_stat=$_GET['stat'];
        if($_stat=='present'){
          $query="Insert into report values('$_stat','')";
          mysqli_query($con,$query);
        }else{
          $query="Insert into report values('$_stat','')";
          mysqli_query($con,$query);
        }
        ?>

    </tbody>

</table>

    </div> 

</body>
</html>