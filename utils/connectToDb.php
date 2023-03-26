<?php

$env = parse_ini_file('../.env');
$hostname = $env["DB_HOST_NAME"];
$username = $env["DB_USER_NAME"];
$password = $env["DB_PASSWORD"];
$database = $env["DB_NAME"];
$plugDatabase = null;

$mysql = mysqli_connect($hostname,  $username,  $password,  $database);
$link = mysqli_connect($hostname,  $username,  $password,  $plugDatabase);

if ($mysql) {
    if ($mysql === false) {
        die("ERROR: Could not connect to DB" . mysqli_connect_error());
    };

    echo 'Connect Successfully. Host info: ' . mysqli_get_host_info($mysql) . "<br>";
}
if ($link) {
    if ($link && $link === false) {
        die("ERROR: Could not connect to DB" . mysqli_connect_error());
    };

    echo 'Connect Successfully. Host info: ' . mysqli_get_host_info($link) . "<br>";
}
// mysqli_close($mysql);
