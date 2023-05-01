<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$liked = false;
if (isset($user['id'])) {
    $user = getNameUser($user['id']);
} else {
    $user = null;
}
$range = 6;
$rowsperpage = 6;

if (!isset($_GET['p'])) {
    $sql = 'SELECT COUNT(*) FROM news';
} else if (isset($_GET['p'])) {
    if (($_GET['p']) == 'info') {
        $sql = 'SELECT COUNT(*) FROM news WHERE `category_id` LIKE 1';
    } else if (($_GET['p']) == 'updates') {
        $sql = 'SELECT COUNT(*) FROM news WHERE `category_id` LIKE 2';
    } else if (($_GET['p']) == 'events') {
        $sql = 'SELECT COUNT(*) FROM news WHERE `category_id` LIKE 3';
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

<div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
    <div class="elementor-widget-container mb-3 ">
        <h2 class="elementor-heading-title elementor-size-default"><a class="elementor-heading-title" href="/partials/news/news.php">Новини</a></h2>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3">

        <?php
        if (!isset($_GET['p'])) {
            require($_SERVER['DOCUMENT_ROOT'] . '/partials/news/newsAll.php');
        } else if (isset($_GET['p'])) {
            if (($_GET['p']) == 'info') {
                require($_SERVER['DOCUMENT_ROOT'] . '/partials/news/newsInfo.php');
            } else if (($_GET['p']) == 'updates') {
                require($_SERVER['DOCUMENT_ROOT'] . '/partials/news/newsUpdates.php');
            } else if (($_GET['p']) == 'events') {
                require($_SERVER['DOCUMENT_ROOT'] . '/partials/news/newsEvents.php');
            }
        }

        ?>

    </div>

    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/pagination.php');
    ?>
</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>