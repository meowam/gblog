<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["user_id"])) {
    header("Location: /index.php");
}
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');

$liked = false;
$user = getNameUser($user['id']);
?>
<style>
    .ti-heart_custom,.ti-saved_custom {
        margin-top: 15%;
    }

    @media (max-width: 1200px) {
        .latest__item {
            padding: 5px;
        }
    }

    @media (max-width: 992px) {
        .latest__item {
            flex-direction: column;
        }

        .latest__info {
            margin-left: 0px;
        }

        .latest__info {
            margin-top: 10px;

        }

  
    }
</style>
<link rel="stylesheet" href="/assets/css/user-profile.css">
<div class="container rounded bg-white mt-5 mb-5 user-profile ">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center ">
                <img class="rounded-circle" width="150px" height="150px" id="ImageUser" style="object-fit: cover;" alt="Avatar" src="/assets/img/avatar/<?php echo $user['avatar'] ?>">
                <span class="font-weight-bold m-t-20" id="usernameSettings">
                    <?php
                    echo $user['username']; ?></span>
                <span class="text-black-50 user-settings-email  m-t-10">
                    <?php
                    echo $user['email']; ?></span>
            </div>
            <div class="d-flex flex-column align-items-center text-center border-top menu_contact-info">
                <button class="btn m-t-20" id="user-profile-saved">Збережене</button>
                <button class="btn m-t-20" id="user-profile-favorites">Улюблене</button>
                <button class="btn m-t-20" id="user-profile-settings">Налаштування</button>
            </div>

        </div>
        <div class="col-md-9 border-right border_contact-info">

            <?php
            require($_SERVER['DOCUMENT_ROOT'] . '/partials/user/user-saved.php');
            ?>

            <?php
            require($_SERVER['DOCUMENT_ROOT'] . '/partials/user/user-liked.php');
            ?>

            <?php
            require($_SERVER['DOCUMENT_ROOT'] . '/partials/user/user-settings.php');
            ?>
        </div>

    </div>
</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>