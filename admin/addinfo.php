<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>

<?php

error_reporting(0);

$server = "localhost";
$username = "root";
$password = "";
$db ="attsystem";

$conn = mysqli_connect('localhost','root','','attsystem') or die('connection failed');

?>


<?php
  try{

    if(isset($_POST['std'])){


        $result = mysqli_query($conn,"insert into students(st_id,st_name,st_dept,st_batch,st_email) values('$_POST[st_id]','$_POST[st_name]','$_POST[st_dept]','$_POST[st_batch]','$_POST[st_email]')");
        $success_msg = "Student added successfully.";

    }


        if(isset($_POST['tcr'])){


          $result = mysqli_query($conn,"insert into teachers(tc_id,tc_name,tc_dept,tc_email,tc_course) values('$_POST[tc_id]','$_POST[tc_name]','$_POST[tc_dept]','$_POST[tc_email]','$_POST[tc_course]')");
          $success_msg = "Teacher added successfully.";
    }

  }
  catch(Execption $e){
    $error_msg =$e->getMessage();
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Attendance Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
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
      <li><a href="addinfo.php">Add Info</a></li>
      <li><a href="viewinfo.php">View Info</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="message">
        <?php if(isset($success_msg)) echo $success_msg; if(isset($error_msg)) echo $error_msg; ?>
</div>

  <div class="row" id="student">

  
      <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
      <h4>Add Student's Information:</h4>
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Student ID</label>
          <div class="col-sm-7">
            <input type="text" name="st_id"  class="form-control" id="input1" placeholder="Enter Student Id" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-7">
            <input type="text" name="st_name"  class="form-control" id="input1" placeholder="Enter Full Name" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Department</label>
          <div class="col-sm-7">
            <input type="text" name="st_dept"  class="form-control" id="input1" placeholder="BEIT/BECE/BESE/BECivil" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Batch</label>
          <div class="col-sm-7">
            <input type="text" name="st_batch"  class="form-control" id="input1" placeholder="Enter Batch" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-7">
            <input type="email" name="st_email"  class="form-control" id="input1" placeholder="Enter Valid Email " />
          </div>
      </div>


      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Add Student" name="std" />
    </form>

  </div>
<br>
<br>
<br>


  <div class="rowtwo" id="teacher">
   
       <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
        <h4>Add Teacher's Information:</h4>
      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Teacher ID</label>
          <div class="col-sm-7">
            <input type="text" name="tc_id"  class="form-control" id="input1" placeholder="Enter Teacher Id" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-7">
            <input type="text" name="tc_name"  class="form-control" id="input1" placeholder="Enter Full Name" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Department</label>
          <div class="col-sm-7">
            <input type="text" name="tc_dept"  class="form-control" id="input1" placeholder="BEIT/BECE/BESE/BECivil" />
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-7">
            <input type="email" name="tc_email"  class="form-control" id="input1" placeholder="Enter Valid Email"/>
          </div>
      </div>

      <div class="form-group">
          <label for="input1" class="col-sm-3 control-label">Course Name</label>
          <div class="col-sm-7">
            <input type="text" name="tc_course"  class="form-control" id="input1" placeholder="Enter Course Name" />
          </div>
      </div>

      <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Add Teacher" name="tcr" />
    </form>
    
  </div>

</body>
</html>





