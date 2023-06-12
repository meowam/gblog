    <div class="p-3 py-5 contact-info" id="form-saved">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="text-right">Збережене</h4>
        </div>
        <div class="row" id="posts-list_SavedUser">
        <?php
        $sql = "SELECT * FROM posts_saved WHERE user_id=" . $user['id'];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) :
                $sql2 = "SELECT * FROM posts WHERE id_post=" . $row['post_id'];
                $result2 = mysqli_query($conn, $sql2);
                $row2 = $result2->fetch_assoc(); ?>

                <div class="col-12 col-md-6 col-sm-4">
                    <div class="latest__item">
                        <a href="/partials/guides/post.php?id=<?= $row2['id_post']; ?>" class="text-decoration-none">
                            <img src="/assets/img/posts/<?= $row2['post_image']; ?>" class="coverFit">
                        </a>
                        <div class="latest__info">
                            <p><?= $row2['title']; ?></p>
                            <div class="d-flex justify-content-between">
                                <p class="latest__date"><?php echo date("M j, Y", strtotime($row2['date_post'])); ?></p>
                                <div class="btn-group btn-group_saved" data-postid="<?php echo $row2['id_post'] ?>" <?php
                                                                                                                if ($user != null) {
                                                                                                                    $liked = getPostSaved($user['id'], $row2['id_post']);
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
        <?php endwhile;
        } else {
            echo "0 results";
        }
        ?>
        </div>
    </div>