<?php require_once 'php_server/db_connect.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container text-center">
        <p>TODO App using Mysql</p>
        <form action="php_server/create.php" method="post">
            <div class="row">
                <div class="col-md-4 offset-md-4"><input class="form-control" type="text" name="task" placeholder="Enter task"/></div>
                <div class="col-md-2"><button type="submit" class="btn btn-primary">Add Task</button></div>
            </div>
        </form>

        <div class="row bg-dark text-white mt-4 col-md-8 offset-md-2">
            <div class="col-md-2 py-3 pl-5">Tasks</div>
            <div class="col-md-2 py-3 offset-md-4">Operations</div>
        </div>

        <?php
            $sql = "SELECT * FROM tasks";
            $result = $connect->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='row mt-4'>";
                    if($row['is_completed'] == 1) {
        ?>
        <div class="col-md-4 offset-md-1 mt-2" style='text-decoration: line-through'><?php echo $row['caption'] ?></div>
        <div class="col-md-1"><input type='checkbox' onclick="location.href='php_server/toggle.php?id=<?php echo $row['id'] ?>' " checked /></div>
        <?php
                    }
                    else if($row['is_completed'] == 0) {
        ?>
        <div class="col-md-4 offset-md-1"><?php echo $row['caption'] ?></div>
        <div class="col-md-1"><input type='checkbox' onclick="location.href='php_server/toggle.php?id=<?php echo $row['id'] ?>' " /></div>
        <?php
                    }
        ?>
        <div class="col-md-2"><button type='button' class="btn btn-block btn-secondary" onclick="location.href='edit.php?id=<?php echo $row['id']?>' ">Edit Task</button></div>
        <div class="col-md-2"><button type='button' class="btn btn-block btn-danger" onclick="location.href='php_server/remove.php?id=<?php echo $row['id']?>' ">Remove Task</button></div>
        </div>
        <?php   }
        ?>
        <div class="row mt-4">
            <div class="col-md-2 offset-md-2"><button class="btn btn-danger btn-block" onclick="location.href='php_server/truncate.php'">Clear</button></div>
        </div>
        <?php
            }
            else {
        ?>
        <div class="col-md-12 mt-4">No Data Available</div>
        <?php
            }
        ?>
    </div>
</body>
</html>