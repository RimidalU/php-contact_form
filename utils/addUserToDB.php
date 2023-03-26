<?php

session_start();

include("./connectToDb.php");

$name = filter_var(trim($_POST['name']), FILTER_UNSAFE_RAW);
$gender = filter_var(trim($_POST['gender']), FILTER_UNSAFE_RAW);
$isCat = filter_var(trim($_POST['cat']), FILTER_UNSAFE_RAW) == 'Y' ? 'Y' : 'N';
$isDog = filter_var(trim($_POST['dog']), FILTER_UNSAFE_RAW) == 'Y' ? 'Y' : 'N';
$isAnother = filter_var(trim($_POST['another']), FILTER_UNSAFE_RAW) == 'Y' ? 'Y' : 'N';
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW);
$confirmPassword = filter_var(trim($_POST['confirmPassword']), FILTER_UNSAFE_RAW);
$country = filter_var(trim($_POST['country']), FILTER_UNSAFE_RAW);
$aboutMe = filter_var(trim($_POST['aboutMe']), FILTER_UNSAFE_RAW);

$uploadsFolder = 'uploads/';
$pathToAvatar = $uploadsFolder . time() . $_FILES['avatar']['name'];
$isLoadFile = move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $pathToAvatar);

if ($password != $confirmPassword) {
    $_SESSION['checkPassMessage'] = 'Password mismatch. Try again.';
    $_SESSION['alertClass'] = 'alert-danger';
    header('Location: /');
};

if ($isLoadFile != 1) {
    $_SESSION['checkPassMessage'] = 'File not loaded.';
    $_SESSION['alertClass'] = 'alert-danger';
    header('Location: /');
};

if ($pass == $confirmPass) {
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, gender, isCat, isDog, isAnother, email, password, country, about, avatar_link)
    VALUES('$name', '$gender', '$isCat', '$isDog', '$isAnother', '$email', '$password', '$country', '$aboutMe', '$pathToAvatar')";

    if (mysqli_query($mysql, $sql)) {
        echo "User added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysql);
    }
    mysqli_close($mysql);
    $_SESSION['currentUser'] = [
        'name' =>  $name,
        'email' =>  $email,
        'country' =>  $country,
        'aboutMe' =>  $aboutMe,
    ];

    header('Location: ./sendEmail.php');
}
