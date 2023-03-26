<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/php-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP contact form</title>
</head>

<body class="h-100">
    <?php
    $link = './utils/getUsers.php';
    $linkName = 'To table';
    require './components/Header.php';
    ?>
    <div class="container-fluid d-flex flex-column h-100">
        <main role="main" class="">
            <div class="row justify-content-center">
                <div class=" bg-light p-4 my-4">
                    <h3 class="pb-2 mb-1 font-italic">
                        Contact Us
                    </h3>
                    <form action="./utils/addUserToDB.php" method="post" id="userSettings" enctype="multipart/form-data" class="border p-2">
                        <div class="row row-cols-2">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="name"> Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" minlength="3" maxlength="50" placeholder="John Doe">
                                    <small id="namelHelp" class="form-text text-muted">*Enter You name (3 to 50 characters)</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="gender"> Gender:</label>
                                    <div class="row ml-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="M" checked>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    <small id="genderHelp" class="form-text text-muted">*Choose you gender</small>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="form-check form-check-inline ml-5">
                                        <input class="form-check-input" type="checkbox" name="cat" id="cat" value="Y">
                                        <label class="form-check-label" for="cat">Cat</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="dog" id="dog" value="Y">
                                        <label class="form-check-label" for="dog">Dog</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="another" id="another" value="Y">
                                        <label class="form-check-label" for="another">Another</label>
                                    </div>
                                    <small id="pet" class="form-text text-muted">*Do you have a pet?</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@email.com" required>
                                    <small id="emailHelp" class="form-text text-muted">*Enter You name</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" minlength="6" maxlength="32" placeholder="123456" required>
                                    <small id="passHelp" class="form-text text-muted">*Enter Password (6 to 32 characters)</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="confirmPassword">Confirm password:</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" aria-describedby="confirmPasswordHelp" minlength="6" maxlength="32" placeholder="123456" required>
                                    <small id="confirmPasswordHelp" class="form-text text-muted">*Confirm the password</small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="country" aria-describedby="countryHelp">Country</label>
                                        </div>
                                        <select class="custom-select" id="country" name="country">
                                            <option selected>Choose...</option>
                                            <option value="Shangri-La">Shangri-La</option>
                                            <option value="Narnia">Narnia</option>
                                            <option value="Oz">Oz</option>
                                        </select>
                                    </div>
                                    <small id="countryHelp" class="form-text text-muted">*Choose your country</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="aboutMe" class="form-label">About me:</label>
                                    <textarea class="form-control" id="aboutMe" name="aboutMe" rows="2" placeholder="We all love to be heard. Tell us something about yourself."></textarea>
                                    <small id="aboutMe" class="form-text text-muted">*Enter text</small>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="avatar" class="form-label">Upload your avatar:</label>
                                    <input class="form-control" name="avatar" type="file" id="avatar">
                                    <small id="avatar" class="form-text text-muted">*Upload a picture or photo</small>
                                </div>
                                <div class="container text-end mt-5">
                                    <input type="reset" class="btn btn-secondary mr-2">
                                    <button type="submit" form="userSettings" class="btn btn-primary">Submit</button>
                                </div>
                                <?php
                                if ($_SESSION['checkPassMessage']) {
                                    $toastMessage = $_SESSION['checkPassMessage'];
                                    $alertClass  = $_SESSION['alertClass'];

                                    require './components/Alert.php';
                                }
                                unset($_SESSION['checkPassMessage'])
                                ?>
                            </div>
                            <div />
                    </form>
                </div>
            </div>
        </main>

        <?php require './components/Footer.php'; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>