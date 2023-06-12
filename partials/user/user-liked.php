<div class="p-3 py-5 contact-info vis-n" id="form-favorites">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-right">Улюблене </h4>
    </div>
    <div class="row" id="posts-list_likedUser">
        <?php
        $sql = "SELECT * FROM news_liked WHERE user_id=" . $user['id'];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) :
                $sql2 = "SELECT * FROM news WHERE id=" . $row['news_id'];
                $result2 = mysqli_query($conn, $sql2);
                $row2 = $result2->fetch_assoc(); ?>

                <div class="col-12 col-md-6 col-sm-4">
                    <div class="latest__item">
                        <a href="/partials/news/news_detail.php?id=<?= $row2['id']; ?>" class=" text-decoration-none">
                            <img src="/assets/img/news/<?= $row2['preview_image']; ?>" class="coverFit">
                        </a>
                        <div class="latest__info">
                            <p><?= $row2['title']; ?></p>
                            <div class="d-flex justify-content-between">
                                <p class="latest__date"><?php echo date("M j, Y", strtotime($row2['date'])); ?></p>
                                <div class="btn-group btn-group_liked" data-newsid="<?php echo $row2['id'] ?>" <?php
                                                                                                                if ($user != null) {
                                                                                                                    $liked = getNewsLiked($user['id'], $row2['id']);
                                                                                                                    echo ('data-userauth="true"');
                                                                                                                } else {
                                                                                                                    echo ('data-userauth="false"');
                                                                                                                }

                                                                                                                ?>>
                                    <i class="ti-heart_custom" <?php if ($liked == true) : ?>style="background-image: url('/assets/img/icon/heart_liked.svg')" <?php endif; ?>></i>
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