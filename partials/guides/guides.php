<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$range = 6;
$rowsperpage = 4;

if (!isset($_GET['p'])) {
    $sql = 'SELECT COUNT(*) FROM posts';
} else if (isset($_GET['p'])) {
    if (($_GET['p']) == 'passage') {
        $sql = 'SELECT COUNT(*) FROM posts_categories WHERE `category_id` LIKE 1';
    } else if (($_GET['p']) == 'mechanic') {
        $sql = 'SELECT COUNT(*) FROM posts_categories WHERE `category_id` LIKE 2';
    } else if (($_GET['p']) == 'tips') {
        $sql = 'SELECT COUNT(*) FROM posts_categories WHERE `category_id` LIKE 3';
    } else if (($_GET['p']) == 'newbie') {
        $sql = 'SELECT COUNT(*) FROM posts_categories WHERE `category_id` LIKE 4';
    } else if (($_GET['p']) == 'characters') {
        $sql = 'SELECT COUNT(*) FROM `posts_categories` WHERE `category_id` LIKE 5';
    } else {
        $sql = 'SELECT COUNT(*) FROM posts';
    }
}
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
    <div class="elementor-widget-container mb-3">
        <h2 class="elementor-heading-title elementor-size-default">Гіди</h2>
    </div>

    <div class="container">
        <div class="row align-items-md-stretch">
            <button class="btn btn-outline-primary m-b-20 create-post" style="font-size: 18px;"><span>+</span> Додати пост</button>
            <?php
            if (!isset($_GET['p'])) {
                require($_SERVER['DOCUMENT_ROOT'] . '/partials/guides/guidesAll.php');
            } else if (isset($_GET['p'])) {
                if (($_GET['p']) == 'passage') {
                    $category = 1;
                } else if (($_GET['p']) == 'mechanic') {
                    $category = 2;
                } else if (($_GET['p']) == 'tips') {
                    $category = 3;
                } else if (($_GET['p']) == 'newbie') {
                    $category = 4;
                } else if (($_GET['p']) == 'characters') {
                    $category = 5;
                }
                if ($category > 0) {
                    require($_SERVER['DOCUMENT_ROOT'] . '/partials/guides/guidesCategories.php');
                }
            }
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