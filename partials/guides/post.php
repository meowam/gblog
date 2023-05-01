<?php
if (isset($_GET['id'])) {
    $id_post = $_GET['id'];
} else {
    header("Location: /partials/guides/guides.php");
}
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$post = getCurrentPost($id_post);
if (isset($_SESSION["user_id"])) {
    $user = getNameUser($user['id']);
}
?>
<style>
    .entry-date {
        display: inline-flex !important;
        justify-content: center;
        align-items: baseline;
    }

    .entry-date-m {
        display: block;
    }

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

    .post-pers-info {
        height: 460px;
        display: flex;
        justify-content: space-between;
    }

    .post-pers-info-image img {
        width: 430px;
        height: 430px;
    }

    .post-pers-info-desc {
        max-width: 500px;
    }

    td {
        text-align: left;
        vertical-align: top;
        height: 40px;
        line-height: 1.2;
        font-size: 20px;
    }

    .td-info {
        width: 190px;
    }

    .post-desc-author {
        max-width: 430px;
        align-items: center;
        justify-content: space-between;
    }

    .post__cat-list a {
        margin-bottom: 1px;
        overflow: hidden;
    }

    .post-text {
        width: 100%;
        padding-top: 40px;
        word-break: break-all;
    }

    @media (max-width: 992px) {
        .td-info {
            width: 170px;
        }

        td {
            line-height: 1;
            font-size: 17px;
            height: 30px;
        }

        .post-article {
            padding-top: 30px;
        }

        .post-pers-info-image img {
            width: 400px;
            height: 400px;
        }

        .post-pes-info-desc-table {
            max-height: 430px;
        }

        .post-pers-info-desc {
            margin-left: 30px;
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
<!--<div class="post-article p-t-50">
     <h4 class="p-b-40">Arataki Itto Guide</h4>
    <div class="post-pers-info">
        <div class="post-pers-info-image">
            <img src="/assets/img/arataki.png" alt="">
        </div>
        <div class="d-flex post-pers-info-desc">
            <table class="post-pes-info-desc-table">
                <tr>
                    <td>З’явився в грі:</td>
                    <td>11.11.2011</td>
                </tr>
                <tr>
                    <td>Як отримати:</td>
                    <td>Бажання - Свято біля воріт оні </td>
                </tr>
                <tr>
                    <td>Рідкість:</td>
                    <td>☆☆☆☆</td>
                </tr>
                <tr>
                    <td>Регіон:</td>
                    <td>Інадзума</td>
                </tr>
                <tr>
                    <td>Зброя:</td>
                    <td>Клеймор</td>
                </tr>
                <tr>
                    <td class="td-info">Особлива страва:</td>
                    <td>Шлях сильного</td>
                </tr>

            </table>

             <!-- <div class="m-r-25"> Характеристики
                <p>З’явився в грі:</p>
                <p>Як отримати:</p>
                <p>Рідкість:</p>
                <p>Регіон:</p>
                <p>Зброя:</p>
                <p>Особлива страва:</p>
            </div>
            <div> БД
                <p>11.11.2011</p>
                <p>Бажання - Свято біля воріт оні </p>
                <p>4 зірочки</p>
                <p>Інадзума</p>
                <p>Клеймор</p>
                <p>Шлях сильного</p>
            </div> 
        </div>  -->

<!-- </div>

    <div class="post-desc-author d-flex">
        <p class="d-inline"> <span>Max Shevshenko </span>| <span> Dec 10, 2020</span> </p>
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary btn-outline-secondary-like">Like</button>
            <button type="button" class="btn btn-sm btn-outline-secondary btn-outline-secondary-save">Save</button>
        </div>
    </div> 
   
</div>-->
<div class="post-text">
    <?= $post['text']; ?>
    <!-- <p>In this article, I’ll be going over everything you need to know about Arataki Itto, including their playstyle, best artifacts, weapons, teams, and more.
        Arataki Itto is a limited 5 star Geo claymore user, who boasts respectable damage within his teams despite having access to no reactions, along with a fairly straightforward playstyle that extracts value at a low barrier of entry.
    </p>
    <h3><b>Active Talents</b></h3>
    <h4><b>Normal Attack – Fight Club Legend</b></h4>
    <p><span style="font-weight: 400;">Performs 4 strikes with unique properties behind his combos/scalings. Apart from his Standard Normal Attacks, Itto has a special charged attack that allows him to perform consecutive slashes [Arataki Kesagiri] without consuming stamina, provided Itto consumes a stack of </span><b>Superlative Superstrength</b><span style="font-weight: 400;">. An important thing to note is that when performing Itto’s Normal Attack combo, dodging or using his Elemental Skill does NOT reset his combo, which is a nice addition to his combo execution.&nbsp;</span></p>
    <p><b>Superlative Superstength</b><span style="font-weight: 400;">: Stacks which are unique to Itto that contribute to performing his Normal Attack combos. When a 2nd hit of your string hits opponents, Itto will gain 1 stack of </span><b>Superlative Superstrength</b><span style="font-weight: 400;">, and then 2 stacks on the 4th hit. Stack management is very relevant when it comes to Itto’s DMG output and will be covered in the Combos section. </span><b>&nbsp;</b></p>
    <h4><b>Elemental Skill – Masatsu Zetsugi: Akaushi Burst!</b></h4>
    <p><span style="font-weight: 400;">Throws a bull called Ushi in front of him, dealing Geo DMG on hit as well as giving Itto 1 stack of </span><b>Superlative Superstrength</b><span style="font-weight: 400;">. On-field, Ushi taunts nearby enemies and will give Itto an additional stack of SS when Ushi takes DMG. This skill can be pressed or held, with Ushi also being considered a Geo construct.</span></p>
    <h4><b>Elemental Burst – Royal Descent: Behold, Itto the Evil!</b></h4>
    <p><span style="font-weight: 400;">The talent that enables Itto to function as a Geo carry. Upon cast, Itto enters a state that converts his Normal/Charge Attacks to Geo DMG that cannot be overridden. Additionally, his Normal Attack SPD is increased and gains an ATK Bonus based on his DEF. </span></p>
    <h4><b>Character Talent Priority</b></h4>
    <p>Here’s a quick talent priority for Arataki Itto.</p>
    <p><b>Normal Attack &gt; Elemental Burst &gt; Elemental Skill</b></p>
    <p><span style="font-weight: 400;">Simply put, the multipliers on his combo slashes/finishers scale with his Normal Attack talent, NOT his burst. Burst talent levels only affect the DEF to ATK conversion. Given that the majority of Itto’s DMG contribution is with his combos, his Normal Attacks should not be neglected whatsoever. </span></p>
    <h4><b>Character Best Combos</b></h4>
    <p><span style="font-weight: 400;">Itto combos while in his burst state are quite varied. On one hand you can choose to prestack his Superlative Superstrength stacks in order to maximize his DMG or you can simply opt not to for ease of performance. On top of Itto’s initial rotation, there are also combos to incorporate from the second rotation onwards, in which you are able to get 1-2 prestacks for his maximum DMG, with the tradeoff being harder to pull off. That being said, here are combos for each level of prestacks [0-2].</span></p> -->
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