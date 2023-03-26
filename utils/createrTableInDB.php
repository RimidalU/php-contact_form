<?php

include("./connectToDb.php");

$sql = "CREATE TABLE users (
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    isCat VARCHAR(1)  DEFAULT 'N',
    isDog VARCHAR(1)  DEFAULT 'N',
    isAnother VARCHAR(1)  DEFAULT 'N',
    email VARCHAR(70) NOT NULL,
    password VARCHAR(128) NOT NULL,
    country VARCHAR(10) NULL,
    about TEXT NULL,
    avatar_link VARCHAR(128) NULL
    )";

if (mysqli_query($mysql, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
}

mysqli_close($mysql);
