<?php
    require_once 'db_connect.php';
   
    $sql = "DELETE FROM tasks WHERE 1";
    if($connect->query($sql) === TRUE) {
        $connect->close();
        header("Location: ../index.php");
    }
    else {
        echo "Error while updating record : ".$connect->error;
    }
    $connect->close();
?>