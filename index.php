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
    $link = './table.php';
    $linkName = 'To table';
    require './components/Header.php';
    ?> <div class="container-fluid d-flex flex-column h-100">
        <main role="main" class="">
            <div class="row justify-content-center">
                <div class="col-md-4 bg-light p-2 my-4">
                    <h3 class="pb-2 mb-1 font-italic">
                        Contact Us
                    </h3>
                    <form action="#" method="post" id="userSettings" enctype="multipart/form-data" class="border p-2">
                        <div class="form-group mb-2">
                            <label for="inputName"> Name:</label>
                            <input type="text" class="form-control" id="inputName" name="inputName" aria-describedby="nameHelp" minlength="3" maxlength="50" placeholder="John Doe">
                            <small id="namelHelp" class="form-text text-muted">*Enter You name (3 to 50 characters)</small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="gender"> Gender:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                            <small id="genderHelp" class="form-text text-muted">*Choose you gender</small>
                        </div>
                        <div class="form-group mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cat" value="cat">
                                <label class="form-check-label" for="cat">Cat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="dog" value="dog">
                                <label class="form-check-label" for="dog">Dog</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="another" value="another">
                                <label class="form-check-label" for="another">Another</label>
                            </div>
                            <small id="pet" class="form-text text-muted">*Do you have a pet?</small>
                        </div>
                            <div class="form-group mb-2">
                            <label for="inputEmail">Email:</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="example@email.com" required>
                            <small id="emailHelp" class="form-text text-muted">*Enter You name</small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputPas">Password:</label>
                            <input type="password" class="form-control" id="inputPass" name="inputPass" aria-describedby="passHelp" minlength="6" maxlength="32" placeholder="123456" required>
                            <small id="passHelp" class="form-text text-muted">*Enter Password (6 to 32 characters)</small>
                        </div>
                        <div class="form-group mb-2">
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputCountry" aria-describedby="countryHelp">Country</label>
                                </div>
                                <select class="custom-select" id="inputCountry" name="inputCountry">
                                    <option selected>Choose...</option>
                                    <option value="Shangri-La">Shangri-La</option>
                                    <option value="Narnia">Narnia</option>
                                    <option value="Oz">Oz</option>
                                </select>
                            </div>
                            <small id="countryHelp" class="form-text text-muted">*Choose your country</small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputAboutMe" class="form-label">About me:</label>
                            <textarea class="form-control" id="inputAboutMe" rows="2" placeholder="We all love to be heard. Tell us something about yourself."></textarea>
                            <small id="inputAboutMe" class="form-text text-muted">*Enter text</small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputAvatar" class="form-label">Upload your avatar:</label>
                            <input class="form-control" type="file" id="inputAvatar">
                            <small id="inputAvatar" class="form-text text-muted">*Upload a picture or photo</small>
                        </div>
                        <div class="container text-end">
                            <input type="reset" class="btn btn-secondary mr-2">
                            <button type="submit" disabled form="userSettings" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <?php require './components/Footer.php'; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>