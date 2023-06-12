<?php

$newsInfo =  getNewsByCategoryLimit(2, $offset, $rowsperpage);
while ($row = mysqli_fetch_assoc($newsInfo)) :
?>

    <div class="col">
        <div class="card shadow-sm">
            <a class="text-decoration-none col__news" href="/partials/news/news_detail.php?id=<?php echo $row['id']; ?>">
                <div class="d-lg-block">
                    <img class="bd-placeholder-img card-img-top" style='height:250px; background-image:url("/assets/img/news/<?php echo $row['preview_image']; ?>");background-size: cover; background-position: left;' alt="">
                </div>
                <div class="card-body">
                    <p class="card-text mb-4 news-text"><?php echo $row['text']; ?></p>
            </a>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group btn-group_liked" data-newsid="<?php echo $row['id'] ?>" <?php
                                                                                                if ($user != null) {
                                                                                                    $liked = getNewsLiked($user['id'], $row['id']);
                                                                                                    echo ('data-userauth="true"');
                                                                                                } else {
                                                                                                    echo ('data-userauth="false"');
                                                                                                }

                                                                                                ?>>
                    <i class="ti-heart_custom" <?php if ($liked == true) : ?>style="background-image: url('/assets/img/icon/heart_liked.svg')" <?php endif; ?>></i>
                </div>
                <small class="text-body-secondary"> <?php echo date('d.m.Y', strtotime($row['date'])); ?></small>
            </div>
        </div>
    </div>
    </div>

<?php endwhile; ?>