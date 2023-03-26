<?php

include("./connectToDb.php");

$sql = "SELECT * FROM users";

$usersSql = mysqli_query($mysql, $sql);

while ($row =mysqli_fetch_array($usersSql, MYSQLI_ASSOC)) {

$users[] = $row;

};

    echo '<pre>';
    print_r($users);
    echo '</pre>';

if (!$users) {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
};

if ($users) {
    echo "Request successful.";
};

mysqli_close($mysql);


    // header('Location: ./table.php');
