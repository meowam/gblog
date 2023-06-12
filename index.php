<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$news1 = getCurrentNewsWithCategory(1);
$news2 = getCurrentNewsWithCategory(2);
?>

<div class="content">
    <div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
        <div class="row mb-2">
            <div class="elementor-widget-container mb-3 mt-2">
                <h2 class="elementor-heading-title elementor-size-default">Останні новини та оновлення</h2>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-3 text-success"><?= $news1['name']; ?></strong>
                        <h4 class="mb-3 overflow-hidden" style="max-height: 27px;"><?= $news1['title']; ?></h3>
                            <p class="card-text mb-auto overflow-hidden" style="max-height: 72px;text-align:justify"><?= $news1['text']; ?></p>
                            <div class="mb-1 text-muted">
                                <a href="/partials/news/news_detail.php?id=<?= $news1['id']; ?>" class="stretched-link">Читати далі</a>
                                <p class="float-r"><?= date('d.m.Y', strtotime($news1['date'])); ?></p>
                            </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" style='width:200px;height:250px; background-image:url("/assets/img/news/<?= $news1['preview_image']; ?>");background-size: cover; background-position: left;    background-position: -59px;' alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-3 text-success"><?= $news2['name']; ?></strong>
                        <h4 class="mb-3 overflow-hidden" style="max-height: 27px;"><?= $news2['title']; ?></h3>
                            <p class="card-text mb-auto overflow-hidden" style="max-height: 72px;text-align:justify"><?= $news2['text']; ?></p>
                            <div class="mb-1 text-muted">
                                <a href="/partials/news/news_detail.php?id=<?= $news2['id']; ?>" class="stretched-link">Читати далі</a>
                                <p class="float-r"><?= date('d.m.Y', strtotime($news2['date'])); ?></p>
                            </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" style='width:200px;height:250px; background-image:url("/assets/img/news/<?= $news2['preview_image']; ?>");background-size: cover;background-position: left;' alt="">
                    </div>
                </div>
            </div>

        </div>
        <div class="elementor-widget-container mb-3 ">
            <h2 class="elementor-heading-title elementor-size-default">5 найкращих гайдів за версією користувачів</h2>
        </div>

        <div class="row align-items-md-stretch">
            <?php
            $post_1 = getCurrentPost(1);
            ?>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/posts/<?= $post_1['post_image']; ?>);background-size: cover;background-position-y:-10px;background-position-x:center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;"><?= $post_1['title']; ?></h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <?php
                                $categoryList = getCategoryFromCurrentPost($post_1['id_post']);
                                while ($row2 = mysqli_fetch_assoc($categoryList)) :

                                    echo '<a>' . $row2['name_category'] . '</a>';
                                endwhile; ?>
                            </div>
                            <div class="hide-sm">
                                <span> <?= getReadMinutes($post_1['text']); ?> хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <a href="/partials/guides/post.php?id=<?= $post_1['id_post'] ?>">
                                <h2><?= $post_1['title']; ?></h2>
                            </a>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc"><?= date('F j, Y', strtotime($post_1['date_post'])); ?></time>
                                    <time class="entry-date entry-date-m"> <?= date('F j, Y', strtotime($post_1['date_post'])); ?></time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a><?php
                                    $countComments = getCountCommentsFromCurrentPost($post_1['id_post']);
                                    echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                                    ?> <span class="postCurrent__comment">Коментарів</span></a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author"><?= $post_1['username']; ?></a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            $post_2 = getCurrentPost(3);
            ?>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/posts/<?= $post_2['post_image']; ?>);background-size:cover;background-position: center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;"><?= $post_2['title']; ?></h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <?php
                                $categoryList = getCategoryFromCurrentPost($post_2['id_post']);
                                while ($row2 = mysqli_fetch_assoc($categoryList)) :

                                    echo '<a>' . $row2['name_category'] . '</a>';
                                endwhile; ?>
                            </div>
                            <div class="hide-sm">
                                <span> <?= getReadMinutes($post_2['text']); ?> хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <a href="/partials/guides/post.php?id=<?= $post_2['id_post'] ?>">
                                <h2><?= $post_2['title']; ?></h2>
                            </a>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc"><?= date('F j, Y', strtotime($post_2['date_post'])); ?></time>
                                    <time class="entry-date entry-date-m"> <?= date('F j, Y', strtotime($post_2['date_post'])); ?></time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a><?php
                                    $countComments = getCountCommentsFromCurrentPost($post_2['id_post']);
                                    echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                                    ?> <span class="postCurrent__comment">Коментарів</span></a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author"><?= $post_2['username']; ?></a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $post_3 = getCurrentPost(4);
            ?>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/posts/<?= $post_3['post_image']; ?>);background-size: cover;background-position-y: -51px;background-position-x:center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;"><?= $post_3['title']; ?></h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <?php
                                $categoryList = getCategoryFromCurrentPost($post_3['id_post']);
                                while ($row2 = mysqli_fetch_assoc($categoryList)) :

                                    echo '<a>' . $row2['name_category'] . '</a>';
                                endwhile; ?>
                            </div>
                            <div class="hide-sm">
                                <span> <?= getReadMinutes($post_3['text']); ?> хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <a href="/partials/guides/post.php?id=<?= $post_3['id_post'] ?>">
                                <h2><?= $post_3['title']; ?></h2>
                            </a>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc"><?= date('F j, Y', strtotime($post_3['date_post'])); ?></time>
                                    <time class="entry-date entry-date-m"> <?= date('F j, Y', strtotime($post_3['date_post'])); ?></time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a><?php
                                    $countComments = getCountCommentsFromCurrentPost($post_3['id_post']);
                                    echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                                    ?> <span class="postCurrent__comment">Коментарів</span></a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author"><?= $post_3['username']; ?></a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $post_4 = getCurrentPost(2);
            ?>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/posts/<?= $post_4['post_image']; ?>);background-size: cover;background-position: center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;"><?= $post_4['title']; ?></h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <?php
                                $categoryList = getCategoryFromCurrentPost($post_4['id_post']);
                                while ($row2 = mysqli_fetch_assoc($categoryList)) :

                                    echo '<a>' . $row2['name_category'] . '</a>';
                                endwhile; ?>
                            </div>
                            <div class="hide-sm">
                                <span> <?= getReadMinutes($post_4['text']); ?> хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <a href="/partials/guides/post.php?id=<?= $post_4['id_post'] ?>">
                                <h2><?= $post_4['title']; ?></h2>
                            </a>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc"><?= date('F j, Y', strtotime($post_4['date_post'])); ?></time>
                                    <time class="entry-date entry-date-m"> <?= date('F j, Y', strtotime($post_4['date_post'])); ?></time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a><?php
                                    $countComments = getCountCommentsFromCurrentPost($post_4['id_post']);
                                    echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                                    ?> <span class="postCurrent__comment">Коментарів</span></a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author"><?= $post_4['username']; ?></a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <?php
            $post_5 = getCurrentPost(5);
            ?>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/posts/<?= $post_5['post_image']; ?>);background-size: cover;background-position:center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;"><?= $post_5['title']; ?></h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <?php
                                $categoryList = getCategoryFromCurrentPost($post_5['id_post']);
                                while ($row2 = mysqli_fetch_assoc($categoryList)) :

                                    echo '<a>' . $row2['name_category'] . '</a>';
                                endwhile; ?>
                            </div>
                            <div class="hide-sm">
                                <span> <?= getReadMinutes($post_5['text']); ?> хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <a href="/partials/guides/post.php?id=<?= $post_5['id_post'] ?>">
                                <h2><?= $post_5['title']; ?></h2>
                            </a>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc"><?= date('F j, Y', strtotime($post_5['date_post'])); ?></time>
                                    <time class="entry-date entry-date-m"> <?= date('F j, Y', strtotime($post_5['date_post'])); ?></time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a><?php
                                    $countComments = getCountCommentsFromCurrentPost($post_5['id_post']);
                                    echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                                    ?> <span class="postCurrent__comment">Коментарів</span></a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author"><?= $post_5['username']; ?></a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="guide-platform mt-4" style='background: url("/assets/img/background-home.png") center/cover no-repeat;'>
            <img src="/assets/img/platform-logo.png" alt="logo" class="guide-platform__logo">
            <div class="pc-guide-platform">
                <div class="guide-platform__slogan" style='background-image: url("/assets/img/slogan.png");'></div>
                <div class="guide-platform__go">Багатоплатформеність&nbsp;для&nbsp;вашої&nbsp;подорожі</div>
                <div class="guide-platform__list">
                    <a href="https://www.playstation.com/games/genshin-impact/" target="_blank" class="guide-platform__item guide-platform__item--ps4"></a>
                    <a href="https://apps.apple.com/app/id1517783697" target="_blank" class="guide-platform__item guide-platform__item--ios"></a>
                    <a href="https://play.google.com/store/apps/details?id=com.miHoYo.GenshinImpact" target="_blank" class="guide-platform__item guide-platform__item--android"></a>
                    <a href="https://sg-public-api.hoyoverse.com/event/download_porter/link/ys_global/genshinimpactpc/default" target="_blank" class="guide-platform__item guide-platform__item--windows"></a>
                </div>
            </div>
            <div class="m-guide-platform">
                <div class="guide-platform__slogan" style="background-image: url(/assets/img/platform-logo-mobile.png);"></div>
                <a href="https://app.adjust.com/x9dxh30" target="_blank" class="m-guide__btn">Download Now</a>
            </div>


        </div>
    </div>

</div>


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>
</div>