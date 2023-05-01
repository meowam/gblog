<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
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
    <link rel="icon" href="/assets/img/icon/xiao.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/mains.css">
    <!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css">  -->
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/adaptive.css">
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
                <!-- text-secondary -->
                <?php
                function comparisonPages($page)
                {
                    $current_page = basename($_SERVER['PHP_SELF'], '.php');
                    $class = '';
                    if ($current_page == $page) {
                        $class = 'nav-link-active';
                    }
                    return $class;
                }
                ?>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle header-nav-link px-2 text-white hover-yellow <?= comparisonPages('news'); ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Новини
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/partials/news/news.php?p=info">Інфо</a></li>
                            <li><a class="dropdown-item" href="/partials/news/news.php?p=updates">Оновлення</a></li>
                            <li><a class="dropdown-item" href="/partials/news/news.php?p=events">Події</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/partials/news/news.php">Усі новини</a></li>
                        </ul>
                    </li>
                    <li><a href="/partials/header_pages/newbie.php" class="header-nav-link nav-link px-2 text-white hover-yellow <?= comparisonPages('newbie'); ?>">Новачку</a></li>
                    <li><a href="/partials/header_pages/heroes.php" class="header-nav-link nav-link px-2 text-white hover-yellow <?= comparisonPages('heroes'); ?>">Персонажі</a></li>
                    <li><a href="/partials/header_pages/code.php" class="header-nav-link nav-link px-2 text-white hover-yellow <?= comparisonPages('code'); ?>">Коди</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle header-nav-link px-2 text-white hover-yellow <?= comparisonPages('guides'); ?>" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Гіди
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                            <li><a class="dropdown-item" href="/partials/guides/guides.php?p=passage">Проходження</a></li>
                            <li><a class="dropdown-item" href="/partials/guides/guides.php?p=mechanic">Механіки</a></li>
                            <li><a class="dropdown-item" href="/partials/guides/guides.php?p=tips">Поради</a></li>
                            <li><a class="dropdown-item" href="/partials/guides/guides.php?p=newbie">Новачку</a></li>
                            <li><a class="dropdown-item" href="/partials/guides/guides.php?p=characters">Персонажі</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/partials/guides/guides.php">Усі гіди</a></li>
                        </ul>
                    </li>

                    <li><a href="/partials/forum/help.php" class="header-nav-link nav-link px-2 text-white hover-yellow <?= comparisonPages('help'); ?>">Допомога</a></li>
                </ul>


                <?php if (isAuth()) {
                    $user = getCurrentUser();
                ?><span id="user_name">
                        <?php
                        echo $user['username'];
                        ?>
                    </span>

                    <div class="dropdown text-end m-l-10">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img id="avatar-header" src="/assets/img/avatar/<?php echo $user['avatar'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="/partials/header_pages/postsUser.php">Пости</a></li>
                            <li><a class="dropdown-item" href="/partials/user/user.php">Налаштування акаунту</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/configs/logout.php">Вийти</a></li>
                        </ul>
                    </div>
                <?php
                } else {
                    require($_SERVER['DOCUMENT_ROOT'] . '/partials/header_pages/login-form.php');
                    require($_SERVER['DOCUMENT_ROOT'] . '/partials/header_pages/register-form.php');

                ?>
                    <div class="text-end btn-log_reg">
                        <a> <button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Вхід</button></a>
                        <a><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2">Реєстрація</button></a>
                    </div>
                <?php
                } ?>

            </div>
        </div>
    </header>

    <div class="container">