<?php
    require_once 'db_connect.php';

    if($_POST) {
        $task = $_POST['task'];
        $id = $_POST['id'];

        if(trim($task) == '') {
            header("Location: ../index.php");
        }
        else {
            $sql = "UPDATE tasks SET caption='$task' WHERE id={$id}";
            if($connect->query($sql) === TRUE) {
                $connect->close();
            }
            else {
                echo "Errpr while updating record : ".$connect->error;
            }
            $connect->close();
        }
    }
?>