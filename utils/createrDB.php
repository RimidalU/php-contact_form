<?php

include("./connectToDb.php");

$sql = "CREATE DATABASE phpContactForm CHARACTER SET utf8 COLLATE utf8_general_ci";

$database = null;

if (mysqli_query($mysql, $sql)) {
    echo "Database created successfully";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
}

mysqli_close($mysql);