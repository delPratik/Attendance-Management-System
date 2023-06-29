<?php 

include "connect.php";

    if (isset($_POST['update'])) {

        $id = $_POST['st_id'];

        $name = $_POST['st_name'];

        $department = $_POST['st_dept'];

        $batch  = $_POST['st_batch'];

        $email = $_POST['st_email'];

        $sql = "UPDATE `students` SET `st_id`='$id',`st_name`='$name',`st_dept`='$department',`st_batch`='$batch',`st_email`='$email' WHERE `st_id`='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `students` WHERE `st_id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $id = $row['st_id'];

            $name = $row['st_name'];

            $department = $row['st_dept'];

            $batch  = $row['st_batch'];

            $email = $row['st_email'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            ID:<br>

            <input type="text" name="st_id" value="<?php echo $user_id; ?>">


            <br>

            Name:<br>

            <input type="text" name="st_name" value="<?php echo $name; ?>">

            <br>

            
            Department:<br>

            <input type="text" name="st_dept" value="<?php echo $department; ?>">

            <br>

            Batch:<br>

            <input type="text" name="st_batch" value="<?php echo $batch; ?>">

            <br>

            Email:<br>

            <input type="email" name="st_email" value="<?php echo $email; ?>">

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