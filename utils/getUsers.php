<?php

session_start();

include("./connectToDb.php");

// Get total records
$sql = "SELECT count(id) AS id FROM users";

$usersSql = mysqli_query($mysql, $sql);

while ($row = mysqli_fetch_array($usersSql, MYSQLI_ASSOC)) {
    $usersCount[] = $row;
};
$allUsersCount = $usersCount[0]['id'];

// limit
$limit =  5;
// Current pagination page number
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
// Offset
$paginationStart = ($page - 1) * $limit;


// get Users on page
$sql = "SELECT * FROM users LIMIT $paginationStart, $limit";

$usersSql = mysqli_query($mysql, $sql);

while ($row = mysqli_fetch_array($usersSql, MYSQLI_ASSOC)) {
    $users[] = $row;
};

// Calculate total pages
$totoalPages = ceil($allUsersCount / $limit);

mysqli_close($mysql);

if (!$users) {
    $_SESSION['getUsersMessage'] = 'Data not received.';
    $_SESSION['alertClass'] = 'alert-danger';
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
};

if ($users) {
    $_SESSION['users'] = $users;

    $_SESSION['paginationUsers'] = [
        'users' =>  $users,
        'totoalPages' =>  $totoalPages,
        'limit' => $limit
    ];

    echo "Request successful.";
};

header('Location: ../table.php');
