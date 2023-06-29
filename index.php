<?php

if(isset($_POST['login']))
{


	try{


		if(empty($_POST['username'])){
			throw new Exception("Username is required!");
			
		}
		if(empty($_POST['password'])){
			throw new Exception("Password is required!");
			
		}

		 include ('connect.php');

		$row=0;
		$result=mysqli_query($conn,"select * from admininfo where username='$_POST[username]' and password='$_POST[password]' and type='$_POST[type]'");

		$row=mysqli_num_rows($result);

		if($row>0 && $_POST["type"] == 'teacher'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: teacher/index.php');
		}

		else if($row>0 &&  $_POST["type"] == 'student'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: student/index.php');
		}

		else if($row>0 && $_POST["type"] == 'admin'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: admin/index.php');
		}

		else{
			throw new Exception("Invalid Username, Password or Role. Try Again!!!");

		}
	}


	catch(Exception $e){
		$error_msg=$e->getMessage();
	}

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Attendance Management System</title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
    <div class="textbox">
      <h1>Attendance Management System</h1>
    </div>
  
    <div class="center">
      <h1>Login</h1>
	  <?php

if(isset($error_msg))
{
	echo $error_msg;
}
?>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="username" id="input1" required>
          <span></span>
          <label for="input1">Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" id="input1" required>
          <span></span>
          <label for="input1">Password</label>
        </div>
        <div class="pass"><a href="reset.html">Forgot Password?</a></div>
        <div class="Role">
          <label for="input1">Role:</label>
          <div class="check_box">
            <label> <input type="radio" name="type" value="student"> Student </label>
            <label><input type="radio" name="type" value="teacher"> Teacher </label>
            <label><input type="radio" name="type"value="admin"> Admin </label>
          </div>
          </div>
        <input type="submit" value="Login" name="login">
        <div class="signup_link">
          Not a member? <a href="#">Contact admin</a>
        </div>
      </form>
    </div>

  </body>
</html>
