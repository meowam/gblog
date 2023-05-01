<?php
if (!isset($_GET['id'])) {
    header("Location: /partials/forum/help.php");
}
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');

$id_disscusion = $_GET['id'];
$disscusion = getCurrentDiscussions($id_disscusion);
while ($row = mysqli_fetch_assoc($disscusion)) :

?>

    <div class="container">
        <div class="col-12 m-t-40">
            <a href="/partials/forum/help.php" class="topbar__back nuxt-link-active">
                <i class="fas fa-long-arrow-alt-left" style="color: #19191a;">&nbsp;</i>
                Повернутись до ОБГОВОРЕНЬ</a>

            <div class="elementor-widget-container mb-3">
                <h2 class="elementor-heading-title elementor-size-default">Обговорення</h2>
            </div>

            <div class="m-b-10 d-flex obg-tema">
                <div class="forum-text">
                    <h5 class="p-t-18 m-b-30 obg-tema-title">
                        <b><?= $row['title_discussions']; ?></b>
                    </h5>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex h-40">
                            <div class="d-flex"><img src="/assets/img/avatar/<?= $row['avatar']; ?>" width="40" alt="">
                                <div class="m-l-22 m-r-40" style="width: 140px;">
                                    <p class="m-b-4" style="overflow:hidden;max-height:20px;"><?= $row['username']; ?></p>
                                    <span>
                                        <?php
                                        echo getDateDiscussions($row['created_discussions']);
                                        ?></span>
                                </div>
                            </div>

                        </div>
                        <div class="m-t-4">
                            <button id="btn-info-obg"><?= $row['name_category']; ?></button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="obg-current_tema">
                <p><?= $row['text_discussions']; ?></p>
            </div>
            <?php
            $comments = getListCommentsOfCurrentDiscussions($id_disscusion);
            $num_rows_comments = mysqli_num_rows($comments);
            ?>
            <div class="obg-list_comments">
                <h6 class="m-t-30"><b>Відповіді <span id="countCommentsDisscusion">(<?= $num_rows_comments ?>)</span> </b> </h6>
                <form action="/scripts/add_commentDisscusion.php" method="post" id="formCommentDisscution">
                    <input type="text" name="id_disscusion" value="<?= $id_disscusion ?>" hidden>
                    <div class="btn-add-comment d-flex justify-content-between">
                        <div class="d-flex obg-comments-info"> <img src="/assets/img/avatar/<?php
                                                                                            if (isset($user)) {
                                                                                                echo $user['avatar'];
                                                                                            } else{
                                                                                                echo "default.jpg";
                                                                                            }
                                                                                            ?>" width="40" height="45" alt="">
                            <textarea name="text_comment" class="m-l-30" style="min-height:50px;word-break: break-word;" placeholder="Додати нову відповідь.."></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary m-l-20 btn-send_comment" type="submit" value="submit">Надіслати</button>
                        </div>
                    </div>
                </form>
                <div id="commentListDiscussion">
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


        </div>



    <?php
endwhile;
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
    ?>