<?php
if (($_GET['order']) != 'new' && ($_GET['order']) != 'comment') {
    header("Location: /partials/forum/help.php?order=new");
}
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}

require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$range = 6;
$rowsperpage = 5;

if (isset($_GET['order'])) {
    if (($_GET['order']) == 'new') {
        $sql = 'SELECT COUNT(*) FROM discussions';
    } else if (($_GET['order']) == 'comment') {
        $sql = 'SELECT COUNT(DISTINCT(`discussion_id`)) FROM `discussions_comments`';
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
    li {
        list-style-type: none;
    }
</style>


<div class="container">
    <div class="col-12 m-t-40">
        <div class="d-flex align-items-center m-b-30 forum-instrument">
            <button class="btn btn-success m-r-50 forum-create-obg" data-bs-toggle="modal" data-bs-target="#exampleModal3">+ Створити обговорення</button>
            <input type="search" placeholder="Пошук обговорень" name="search_discussions" id="search_discussions" class="form-control form-control-dark">
            <li class="nav-item dropdown m-l-50 forum-dropdown-pc">
                <a class="nav-link dropdown-toggle header-nav-link px-2 " href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Сортування
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                    <li><a class="dropdown-item" href="?order=new">Нові</a></li>
                    <li><a class="dropdown-item" href="?order=comment">Остання відповідь</a></li>
                </ul>
            </li>
            <div class="forum-dropdown-mb justify-content-between">
                <span>Сортування:</span>
                <div>
                    <button class="btn btn-outline-primary">Нові</button>
                    <button class="btn btn-outline-primary">Остання відповідь</button>
                </div>
            </div>
        </div>
        <div id="result_search_discussions"></div>
        <div id="list_discussions">
            <?php
            if ($order === 'new') {
                $discussionsList = getAllDiscussionsLimit($offset, $rowsperpage);
                while ($row = mysqli_fetch_assoc($discussionsList)) :
            ?>
                    <a href="/partials/forum/help-details.php?id=<?= $row['id_discussions']; ?>">
                        <div class="m-b-30 d-flex forum-tema">
                            <div class="forum-figure">
                                <div></div>
                            </div>
                            <div class="forum-text m-l-23 m-r-20">
                                <h5 class="p-t-18 m-b-30 forum-title-obg">
                                    <b><?= $row['title_discussions']; ?></b>
                                </h5>
                                <div class="d-flex justify-content-between forum-info-obg">
                                    <div class="d-flex h-40">
                                        <div class="d-flex"><img src="/assets/img/avatar/<?= $row['avatar']; ?>" width="40" height="40" alt="">
                                            <div class="m-l-12 m-r-40" style="width: 140px;">
                                                <p class="m-b-4" style="overflow:hidden;max-height:20px;"><?= $row['username']; ?></p>
                                                <span>
                                                    <?php
                                                    echo getDateDiscussions($row['created_discussions']);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div style="min-width: 160px;" class="forum-last-update-pc">
                                            <p class="m-b-4">&nbsp; </p>
                                            <span> <?php $lastcomment = getLastCommentsOfCurrentDiscussions($row['id_discussions']);
                                                    if ($lastcomment != null) {
                                                        echo getDateLastCommentDiscussions($lastcomment['created_comment']);
                                                    } ?></span>
                                        </div>
                                    </div>
                                    <div class="m-t-4 forum-last-update-mb"> <span><?php if ($lastcomment != null) {
                                                                                        echo getDateLastCommentDiscussions($lastcomment['created_comment']);
                                                                                    } ?></span>
                                        <button><?= $row['name_category']; ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile;
            }    // выполнить действие для параметра order=new
            elseif ($order === 'comment') {
                $discussionsList1 = getAllDiscussionsByLastComment($offset, $rowsperpage);
                while ($row = mysqli_fetch_assoc($discussionsList1)) :
                ?>
                    <a href="/partials/forum/help-details.php?id=<?= $row['id_discussions']; ?>">
                        <div class="m-b-30 d-flex forum-tema">
                            <div class="forum-figure">
                                <div></div>
                            </div>
                            <div class="forum-text m-l-23 m-r-20">
                                <h5 class="p-t-18 m-b-30 forum-title-obg">
                                    <b><?= $row['title_discussions']; ?></b>
                                </h5>
                                <div class="d-flex justify-content-between forum-info-obg">
                                    <div class="d-flex h-40">
                                        <div class="d-flex"><img src="/assets/img/avatar/<?= $row['avatar']; ?>" width="40" height="40" alt="">
                                            <div class="m-l-12 m-r-40" style="width: 140px;">
                                                <p class="m-b-4" style="overflow:hidden;max-height:20px;"><?= $row['username']; ?></p>
                                                <span>
                                                    <?php
                                                    echo getDateDiscussions($row['created_discussions']);
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div style="min-width: 160px;" class="forum-last-update-pc">
                                            <p class="m-b-4">&nbsp; </p>
                                            <span> <?php $lastcomment = getLastCommentsOfCurrentDiscussions($row['id_discussions']);
                                                    if ($lastcomment != null) {
                                                        echo getDateLastCommentDiscussions($lastcomment['created_comment']);
                                                    } ?></span>
                                        </div>
                                    </div>
                                    <div class="m-t-4 forum-last-update-mb"> <span><?php if ($lastcomment != null) {
                                                                                        echo getDateLastCommentDiscussions($lastcomment['created_comment']);
                                                                                    } ?></span>
                                        <button><?= $row['name_category']; ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php endwhile;
            } else {
                // обработать недопустимое значение параметра order
            } ?>
        </div>
        <!-- <div class="m-b-30 d-flex forum-tema">
            <div class="forum-figure">
                <div></div>
            </div>
            <div class="forum-text m-l-23 m-r-20">
                <h5 class="p-t-18 m-b-30 forum-title-obg">
                    <b>How do how deep how you
                        are How do how deee How do how deep how you are How do how deepe How do how deep how you are
                        f How do how deepe How do how deep how you are f How do how deepp how you are f How do how d
                        fffffff eep
                    </b>
                </h5>
                <div class="d-flex justify-content-between forum-info-obg">
                    <div class="d-flex h-40">
                        <div class="d-flex"><img src="/assets/img/avatar/default.jpg" width="40" height="100%" alt="">
                            <div class="m-l-12 m-r-40" style="min-width: 140px;">
                                <p>Anastasia</p>
                                <span>сьогодні о 22:24</span>
                            </div>
                        </div>
                        <div style="min-width: 160px;" class="forum-last-update-pc">
                            <p>&nbsp; </p>
                            <span>остання відповідь о 23:51</span>
                        </div>
                    </div>
                    <div class="m-t-4 forum-last-update-mb"> <span>остання відповідь о 23:51</span>
                        <button>Зауваження</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div id="pagination_discussions">
            <?php
            require($_SERVER['DOCUMENT_ROOT'] . '/configs/pagination.php'); ?>
        </div>
        <?php
        require($_SERVER['DOCUMENT_ROOT'] . '/partials/forum/add-form.php');
        ?>

    </div>


    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
    ?>