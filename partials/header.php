<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config/db.php');
if (!isset($_SESSION)) {
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/mains.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/main.css">

</head>
<style>
    .bd-example-row [class^="col"],
    .bd-example-cols [class^="col"]>*,
    .bd-example-cssgrid [class*="grid"]>* {
        padding-top: .75rem;
        padding-bottom: .75rem;
        background-color: rgba(12, 12, 12, 0);
        border: none;
    }
</style>
<body>

    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img class="logo" src="/assets/img/logo_white.svg" height="32" alt="logo">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/news.php" class="nav-link px-2 text-white hover-yellow nav-link-active">Новини</a></li>
                    <!-- text-secondary -->
                    <li><a href="/newbie.php" class="nav-link px-2 text-white hover-yellow">Новачку</a></li>
                    <li><a href="/characters.php" class="nav-link px-2 text-white hover-yellow">Персонажі</a></li>
                    <li><a href="/guides.php" class="nav-link px-2 text-white hover-yellow">Гіди</a></li>
                    <li><a href="/help.php" class="nav-link px-2 text-white hover-yellow">Допомога</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <a> <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Вхід</button></a>
                    <a><button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal2">Реєстрація</button></a>
                </div>
                <!-- <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="#">Posts</a></li>
                        <li><a class="dropdown-item" href="#">Favorites</a></li>
                        <li><a class="dropdown-item" href="#">Saved</a></li>
                        <li><a class="dropdown-item" href="#">Profile Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </header>
    <div class="container">