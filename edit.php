<?php
    require_once 'php_server/db_connect.php';

    if($_GET['id']) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tasks WHERE id = {$id}";
        $result = $connect->query($sql);
        $data = $result->fetch_assoc();
        $connect->close();
?>
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
    <div class="container">
        <form action="php_server/update.php" method="post">
            <div class="row">
                <div class="col-md-2"><input type="text" class="form-control" name="task" value="<?php echo $data['caption'] ?>" /></div>
                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <div class="col-md-2"><button type="submit" class="btn btn-block btn-success">Save Changes</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-block btn-secondary" onclick="location.href='index.php'">Back</button></div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    }
?>