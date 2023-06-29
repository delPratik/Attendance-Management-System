<?php 

include "connect.php";

    if (isset($_POST['update'])) {

        $id = $_POST['tc_id'];

        $name = $_POST['tc_name'];

        $department = $_POST['tc_dept'];

        $email = $_POST['tc_email'];

        $course  = $_POST['tc_course'];

        $sql = "UPDATE `teachers` SET `tc_id`='$id',`tc_name`='$name',`tc_dept`='$department',`tc_email`='$email',`tc_course`='$course' WHERE `tc_id`='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `teachers` WHERE `tc_id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $id = $row['tc_id'];

            $name = $row['tc_name'];

            $department = $row['tc_dept'];

            $email = $row['tc_email'];

            $course  = $row['tc_course'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            ID:<br>

            <input type="text" name="tc_id" value="<?php echo $user_id; ?>">


            <br>

            Name:<br>

            <input type="text" name="tc_name" value="<?php echo $name; ?>">

            <br>

            
            Department:<br>

            <input type="text" name="tc_dept" value="<?php echo $department; ?>">

            <br>

            Email:<br>

            <input type="email" name="tc_email" value="<?php echo $email; ?>">

            <br>

            Course:<br>

            <input type="text" name="tc_course" value="<?php echo $course; ?>">

            <br><br>


            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: viewinfo.php');

    }   

}

?> 