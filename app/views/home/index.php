<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Menu</h1>
    <a href="/home/new">Register</a>
    <table>
        <tr><td>Name</td><td>Actions</td></tr>
        <?php
            foreach($data as $user)
            {
                echo "<tr><td>$user->username</td><td><a href='/home/detail/$user->user_id'>Details</a></td></tr>";
            }

        ?>
    </table>
</body>
</html>