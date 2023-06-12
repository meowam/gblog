<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
if (isAuth()) {
    $user = getNameUser($user['id']);
} else {
    $user = null;
    $liked = false;
}
$range = 6;
$rowsperpage = 2;
$sql = 'SELECT COUNT(*) FROM posts_categories WHERE `category_id` LIKE 4';
[$numrows] = getCountOfTable($sql);
$totalpages = ceil($numrows / $rowsperpage);
if (isset($_GET['curr_p']) && is_numeric($_GET['curr_p'])) {
    $curr_p = (int) $_GET['curr_p'];
} else {
    $curr_p = 1;
}

if ($curr_p > $totalpages) {
    $curr_p = $totalpages;
}
if ($curr_p < 1) {
    $curr_p = 1;
}

$offset = ($curr_p - 1) * $rowsperpage;
$category = 4;
?>

<style>
    .ti-saved_custom {
        margin-top: auto;
        display: inline-block;
    }

    @media (max-width: 1008px) {
        .postCurrent_author-div {
            max-width: 150px;
        }
    }

    @media (max-width: 768px) {
        .postCurrent__comment {
            display: none;
        }
    }
</style>
<div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
    <div class="elementor-widget-container mb-3 ">
        <h2 class="elementor-heading-title elementor-size-default">Новачкам</h2>
    </div>

    <div class="container">
        <div class="row align-items-md-stretch">
            <?php
            if ($user != null) {
            ?>
                <button class="btn btn-outline-primary m-b-20 create-post" style="font-size: 18px;"><span>+</span> Додати пост</button>
            <?php
            }
            require($_SERVER['DOCUMENT_ROOT'] . '/partials/guides/guidesCategories.php');
            ?>
        </div>
        <?php
        require($_SERVER['DOCUMENT_ROOT'] . '/configs/pagination.php');
        ?>
    </div>
</div>


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>