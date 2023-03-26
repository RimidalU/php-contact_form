<?php

session_start();

include("./connectToDb.php");

$sql = "SELECT * FROM users";

$usersSql = mysqli_query($mysql, $sql);

mysqli_close($mysql);

while ($row = mysqli_fetch_array($usersSql, MYSQLI_ASSOC)) {

    $users[] = $row;
};

if (!$users) {
    $_SESSION['getUsersMessage'] = 'Data not received.';
    $_SESSION['alertClass'] = 'alert-danger';
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
};

if ($users) {
    $_SESSION['users'] = $users;
    echo "Request successful.";
};

header('Location: ../table.php');
