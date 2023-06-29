<?php 

include "connect.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `students` WHERE `st_id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }
    
    header('location: viewinfo.php');

} 
