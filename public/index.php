<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

<?php
    echo "Hello there Heroku, Rick here!";
?>

<?php
//Call getenv() function without argument
$env_array =getenv();
echo "<h3>The list of environment variables with values are :</h3>";
//Print all environment variable names with values
foreach ($env_array as $key=>$value)
{
    echo "$key => $value <br />";
}
?>