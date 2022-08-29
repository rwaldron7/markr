<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>
</head>
<body>
    <h1>Delete</h1>
    <p>Are you sure you want to delete user <?=$data->username ?>?</p>
    <form action="" method="post">
        <button name="action" value="Yes">Yes</button>
    </form>
    <form action="/home/index">
        <button value="No">No</button>
    </form>
</body>
</html>