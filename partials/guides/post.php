<?php
if (isset($_GET['id'])) {
    $id_post = $_GET['id'];
} else {
    header("Location: /partials/guides/guides.php");
}

require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
if (isAuth()) {
    $user = getNameUser($user['id']);
} else {
    $user = null;
    $liked = false;
}
$post = getCurrentPost($id_post);
if (isset($_SESSION["user_id"])) {
    $user = getNameUser($user['id']);
}
?>
<style>
    .post {
        position: relative;
        width: 100%;
        /* height: 650px; */
        overflow: hidden;
    }

    .image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        /* height: 100%; */
        height: 320px;
        z-index: -1;
    }

    .image-container img {
        width: 100%;
        /* height: 650px; */
        height: 320px;
        object-fit: cover;
    }

    .post__image-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        /* height: 60%; */
        height: 320px;
        z-index: 0;
        background-color: rgba(62, 40, 91, 0.5);
    }

    .post__img-info {
        position: relative;
        z-index: 1;
        text-align: center;
        padding-top: 60px;
        margin-bottom: 70px;
    }

    .post__cat-list a:not(.role-ico) {
        display: inline-block;
        font-family: "Raleway", sans-serif;
        font-size: 12px;
        line-height: 28px;
        font-weight: 700;
        color: #fff;
        border: 1px solid #fff;
        border-radius: 15px;
        text-transform: uppercase;
        padding: 0 10px;
        text-decoration: none;
        margin-right: 10px;
    }

    .post__img-info h3 {
        color: #fff;
        margin: 0 auto;
        overflow: hidden;
        width: 600px;
        line-height: 50px;
        font-weight: 700;
        margin-bottom: 50px;
        max-height: 100px;
    }

    .post__img-info>span {
        display: inline-block;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
    }

    .post__img-info a {
        color: #fff;
        text-decoration: none;
    }


    .post__cat-list a {
        margin-bottom: 1px;
        overflow: hidden;
    }

    .post-text {
        width: 100%;
        padding-top: 40px;
        /* word-break: break-all; */
    }

    @media (max-width: 992px) {

        .post-article {
            padding-top: 30px;
        }

        .post-desc-author {
            max-width: 400px;
        }

    }

    @media (max-width: 768px) {

        .post-pers-info-desc {
            margin-left: 0px;
            padding-top: 30px;
            margin-bottom: 30px;
        }

        .post-desc-author {
            max-width: 400px;
        }

        .post-pers-info {
            flex-direction: column;
            height: auto;
        }

        .post-pes-info-desc-table {

            max-height: none;
        }

        td {
            font-size: 14px;
            width: auto;
        }

        .td-info {
            width: 160px;
        }

        .post__img-info h3 {
            width: 400px;
            font-size: 19px;
            line-height: 35px;
            max-height: 70px;
        }

        .post__img-info {
            padding-top: 90px;
            margin-bottom: 40px;
        }

        .post-author {
            display: block;
        }

        .post-count-min-read {
            display: none;
        }

        .author.vcard {
            display: inline-flex;
            align-items: baseline;
        }

        .comment-link a {
            display: inline-flex;
            align-items: baseline;
        }

        .comment-link a span {
            display: none;
        }
    }

    @media (max-width: 426px) {
        .post__img-info h3 {
            width: auto;
            font-size: 17px;
            line-height: 28px;
            padding: 0 10px;
            margin-bottom: 50px;
            max-height: 85px;
        }

        .post__img-info {
            padding-top: 50px;
        }

        .entry-date,
        .byline-read {
            display: flex !important;
            justify-content: center;
            align-items: baseline;
        }

        .post__cat-list {
            max-height: 30px;
            overflow: hidden;
        }

        .post-desc-author {
            max-width: none;
        }

        .post-pers-info-image img {
            width: 300px;
            height: 300px;
        }

        .post-pes-info-desc-table {
            width: auto;
        }

        .td-info {
            width: 135px;
        }

    }
    .post-text p{
        font-size: 16px;
    }
</style>

<div class="post">
    <div class="image-container">
        <img src="/assets/img/posts/<?= $post['post_image']; ?>" />
        <div class="post__image-bg"></div>
    </div>
    <div class="post__img-info">
        <h3><?= $post['title']; ?></h3>
        <div class="post__cat-list">
            <?php
            $categoryList = getCategoryFromCurrentPost($post['id_post']);
            while ($row2 = mysqli_fetch_assoc($categoryList)) :
                echo '<a>' . $row2['name_category'] . '</a>';
            endwhile; ?>
        </div>
        <div id="postCurrent" class="m-t-15">
            <div class="postCurrent__info">
                <span class="m-r-20">
                    <i class="far fa-clock post-meta-icon"></i>
                    <a><b> <?= date('d.m.Y', strtotime($post['date_post'])); ?></b> </a>
                </span>
                <span class="m-r-20">
                    <i class="far fa-comment-alt post-meta-icon"></i>
                    <a> <b><?php
                            $countComments = getCountCommentsFromCurrentPost($post['id_post']);
                            echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                            ?> <span class="postCurrent__comment">Коментарів</span> </b></a>
                </span>

                <span class="postCurrent_author-div m-r-20">
                    <i class="far fa-user post-meta-icon"></i>
                    <a class="postCurrent__author"><b class="postCurrent__comment"> <?= $post['username']; ?></b></a>
                </span>

                <div class="btn-group btn-group_saved" data-postid="<?php echo $post['id_post'] ?>" <?php
                                                                                                    if ($user != null) {
                                                                                                        $liked = getPostSaved($user['id'], $post['id_post']);
                                                                                                        echo ('data-userauth="true"');
                                                                                                    } else {
                                                                                                        echo ('data-userauth="false"');
                                                                                                    }

                                                                                                    ?>>
                    <i class="ti-saved_custom" <?php if ($liked == true) : ?>style="background-image: url('/assets/img/icon/bookmark_saved.svg')" <?php endif; ?>></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="post-text">
    <?= $post['text']; ?>
</div>
<?php
$comments = getListCommentsOfCurrentPost($id_post);
$num_rows_comments = mysqli_num_rows($comments);
?>
<div class="obg-list_comments">
    <h6 class="m-t-30"><b>Відповіді <span id="countCommentsPost">(<?= $num_rows_comments ?>)</span> </b> </h6>
    <form action="#" method="post" id="formCommentPost">
        <input type="text" name="id_post" value="<?= $id_post; ?>" hidden>
        <div class="btn-add-comment d-flex justify-content-between">
            <div class="d-flex obg-comments-info"> <img src="/assets/img/avatar/<?php
                                                                                if (isset($user)) {
                                                                                    echo $user['avatar'];
                                                                                } else {
                                                                                    echo "default.jpg";
                                                                                }
                                                                                ?>" width="40" height="45" alt="">
                <textarea name="text_comment" class="m-l-30" style="min-height:50px;word-break: break-word;" placeholder="Додати нову відповідь.."></textarea>
            </div>
            <div>
                <button class="btn btn-primary m-l-20 btn-send_comment2" type="submit" value="submit">Надіслати</button>
            </div>
        </div>
    </form>
    <div id="commentListPost">
        <?php while ($row2 = mysqli_fetch_assoc($comments)) : ?>
            <div class="comment-user m-t-20 m-b-50">
                <div class="d-flex">
                    <div class="d-flex"><img src="/assets/img/avatar/<?= $row2['avatar']; ?>" width="40" alt="">
                        <div class="m-l-22 m-r-40" style="width: 140px;">
                            <p class="m-b-4" style="overflow:hidden;max-height:20px;"><?= $row2['username']; ?></p>
                            <span><?= getDateDiscussions($row2['created_comment']); ?></span>
                        </div>
                    </div>

                </div>
                <div class="m-l-62 m-t-20" style="padding:10px;background-color:#f2f2f2;border-bottom: 1px solid black;min-height: 50px;">
                    <p><?= $row2['text_comment']; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>