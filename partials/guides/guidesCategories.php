<?php
$categoryPost = getCategoryofListPost($category, $offset, $rowsperpage);
while ($row = mysqli_fetch_assoc($categoryPost)) :
?>
    <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
        <div class="view view-first">
            <img style="background-image: url(/assets/img/posts/<?= $row['post_image']; ?>);background-size: cover;background-position-x:center;">
            <div class="view-before">
                <h4 class="overflow-hidden" style="max-height:28px;"><?= $row['title']; ?></h4>
            </div>
            <div class="mask">
                <div class="top-article-meta">
                    <div class="cat-list">
                        <?php
                        $categoryList = getCategoryFromCurrentPost($row['id_post']);
                        while ($row2 = mysqli_fetch_assoc($categoryList)) :

                            echo '<a>' . $row2['name_category'] . '</a>';
                        endwhile; ?>
                    </div>
                    <div class="hide-sm">
                        <span> <?= getReadMinutes($row['text']); ?> хв читати</span>
                    </div>
                </div>
                <div class="bot-article-meta">
                    <a href="/partials/guides/post.php?id=<?= $row['id_post']?>"><h2><?= $row['title']; ?></h2></a>
                </div>
                <div id="postCurrent" class="m-t-15">
                    <div class="postCurrent__info">
                        <span class="m-r-20">
                            <i class="far fa-clock post-meta-icon"></i>
                            <a><b> <?= date('F j, Y', strtotime($row['date_post'])); ?></b> </a>
                        </span>
                        <span class="m-r-20">
                            <i class="far fa-comment-alt post-meta-icon"></i>
                            <a><b><?php
                                    $countComments = getCountCommentsFromCurrentPost($row['id_post']);
                                    echo '<span id="countCOmmentPost">' . $countComments['count_comment'] . '</span>';
                                    ?> <span class="postCurrent__comment">Коментарів</span>
                                </b></a>
                        </span>
                        <span class="postCurrent_author-div m-r-20">
                            <i class="far fa-user post-meta-icon"></i>
                            <a class="postCurrent__author"><b class="postCurrent__comment"> <?= $row['username']; ?></b></a>
                        </span>
                        <div class="d-flex">
                            <div class="btn-group btn-group_saved" data-postid="<?php echo $row['id_post'] ?>" <?php
                                                                                                                if ($user != null) {
                                                                                                                    $liked = getPostSaved($user['id'], $row['id_post']);
                                                                                                                    echo ('data-userauth="true"');
                                                                                                                } else {
                                                                                                                    echo ('data-userauth="false"');
                                                                                                                }
                                                                                                                ?>>
                                <i class="ti-saved_custom" <?php if ($liked == true) : ?>style="background-image: url('/assets/img/icon/bookmark_saved.svg')" <?php endif; ?>></i>&nbsp;
                                <?php if ($liked == true) { ?>
                                    <b><span class="saved_post" data-postid="<?php echo $row['id_post'] ?>"> Збережено</span></b>
                                <?php } else {
                                    echo '<b><span class="saved_post" data-postid="'. $row['id_post']. '"> Зберегти</span></b>';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endwhile;
?>