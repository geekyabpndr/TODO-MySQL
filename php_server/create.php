<?php
    require_once 'db_Connect.php';

    if($_POST) {
        $task = $_POST['task'];
        
        if(trim($task) == '') {
            header("Location: ../index.php");
        }
        else {
            $sql = "INSERT INTO tasks VALUES (null,'$task',0)";
            if($connect->query($sql) === TRUE) {
                $connect->close();
                header("Location: ../index.php");
            }
            else {
                header("Location: ../index.php");
            }
            $connect->close();    
        }    
    }
?>