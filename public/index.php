<?php
$filename = '../config/localdb.php';

if (file_exists($filename)) {
    echo "The file $filename exists";
    include '../config/localdb.php';
}
else {
    echo "The file $filename does not exist";
    include '../config/remotedb.php';
}
?>

<?php
    echo "Hello there Heroku, Rick here!";
?>