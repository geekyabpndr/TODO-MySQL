<?php
    require_once 'db_connect.php';

    if($_GET['id']) {
        $id = $_GET['id'];

        $sql = "DELETE FROM tasks WHERE id={$id}";
        if($connect->query($sql) === TRUE) {
            $connect->close();
            header("Location: ../index.php");
        }
        else {
            echo "Error while updating record : ".$connect->error;
        }
        $connect->close();
    }
?>