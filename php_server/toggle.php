<?php
    require_once 'db_Connect.php';

    $id = $_GET['id'];
    $connect->query("UPDATE tasks SET is_completed=(is_completed + 1)%2 WHERE id={$id}") or die(mysqli_error($connect));
?>
<script>
    window.location = "../index.php";
</script>