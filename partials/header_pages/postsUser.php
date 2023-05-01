<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["user_id"])) {
    header("Location: /index.php");
}

require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$user = getNameUser($user['id']);
?>


<div class="p-3  m-0 border-0 bd-example bd-example-row">
    <div class="elementor-widget-container mb-3 ">
        <h2 class="elementor-heading-title elementor-size-default">Мої пости</h2>
    </div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 row-cols-xl-3 g-3">
        <?php $posts = getPostByUser($user['id']);
        while ($row = mysqli_fetch_assoc($posts)) :
        ?>
            <a href="/partials/guides/post.php?id=<?php echo $row['id_post']; ?>">
                <div class="col" id="postUser<?php echo $row['id_post']; ?>">
                    <div class="card shadow-sm">
                        <div class="d-lg-block">
                            <img class="bd-placeholder-img card-img-top" style='height:250px; background-image:url("/assets/img/posts/<?php echo $row['post_image']; ?>");background-size: cover;' alt="">
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="min-height: 100px;max-height: 100px; overflow: hidden;"><?php echo $row['title']; ?></p>
                            <div class="d-flex justify-content-between align-items-center p-t-10">
                                <div class="btn-group" style="width: 100%;">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php endwhile; ?>
    </div>
</div>





<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>