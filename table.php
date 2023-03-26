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
    <title>PHP table</title>
</head>

<body class="h-100">
    <?php
    $link = '/';
    $linkName = 'To form';
    require './components/Header.php';
    ?> <div class="container-fluid d-flex flex-column h-100">
        <main role="main" class="">
            <div class="row justify-content-center">
                <div class=" bg-light p-2 my-4">
                    <h3 class="pb-2 mb-1 font-italic">
                        Users Table
                    </h3>
                    <?php
                    if ($_SESSION['getUsersMessage']) {
                        $toastMessage = $_SESSION['getUsersMessage'];
                        $alertClass  = $_SESSION['alertClass'];

                        require './components/Alert.php';
                    }
                    unset($_SESSION['getUsersMessage']);
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Country</th>
                                <th scope="col">Email</th>
                                <th scope="col">Cat</th>
                                <th scope="col">Dog</th>
                                <th scope="col">OtherPet</th>
                                <th scope="col">AboutMe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totoalPages = $_SESSION['paginationUsers']['totoalPages'];
                            $limit = $_SESSION['paginationUsers']['limit'];

                            $users = $_SESSION['paginationUsers']['users'];
                            foreach ($users as $user) :
                            ?>
                                <tr>
                                    <th scope="row"> <?php echo $user['id']; ?></th>
                                    <td>
                                        <img style="max-width: 2rem" src="<?php echo $user['avatar_link']; ?>" onerror="this.src='./img/unknownUser.svg'" alt="<?php echo $user['name']; ?>" />
                                    </td>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['gender']; ?></td>
                                    <td><?php echo $user['country']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['isCat']; ?></td>
                                    <td><?php echo $user['isDog']; ?></td>
                                    <td><?php echo $user['isAnother']; ?></td>
                                    <td><?php echo $user['about']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example mt-5">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $totoalPages; $i++) : ?>
                                <li class="page-item <?php if ($page == $i) {
                                                            echo 'active';
                                                        } ?>">
                                    <a class="page-link" href="./utils/getUsers.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
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