<?php

session_start();

include("./connectToDb.php");

$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
$gender = filter_var(trim($_POST['gender']), FILTER_UNSAFE_RAW);
$isCat = filter_var(trim($_POST['cat']), FILTER_UNSAFE_RAW) == 'Y'? 'Y' : 'N';
$isDog = filter_var(trim($_POST['dog']), FILTER_UNSAFE_RAW) == 'Y'? 'Y' : 'N';
$isAnother = filter_var(trim($_POST['another']), FILTER_UNSAFE_RAW) == 'Y'? 'Y' : 'N';
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
$confirmPassword = filter_var(trim($_POST['confirmPassword']), FILTER_UNSAFE_RAW);
$country = filter_var(trim($_POST['country']), FILTER_UNSAFE_RAW);
$aboutMe = filter_var(trim($_POST['aboutMe']), FILTER_UNSAFE_RAW);
$avatar = filter_var(trim($_POST['avatar']), FILTER_UNSAFE_RAW);

if ($password != $confirmPassword) {
    $_SESSION['checkPassMessage'] = 'Password mismatch. Try again.';
    $_SESSION['alertClass'] = 'alert-danger';
    header('Location: /');
};

if ($pass == $confirmPass) {
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, gender, isCat, isDog, isAnother, email, password, country, about, avatar_link)
    VALUES('$name', '$gender', '$isCat', '$isDog', '$isAnother', '$email', '$password', '$country', '$aboutMe', '$avatar')";

    if (mysqli_query($mysql, $sql)) {
        echo "User added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
    }
    mysqli_close($mysql);

    $_SESSION['checkPassMessage'] = 'Form data submitted successfully! <br/> You can go to the table page or enter new data';
    $_SESSION['alertClass'] = 'alert-success';

    header('Location: /');
}
