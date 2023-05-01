<?php
if (!isset($_GET['id'])) {
    header("Location: /index.php");
} 
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
if (isset($_GET['id'])) {
    $news_id = $_GET['id'];
    $news = getCurrentNews($news_id);
    $category = getCurrentCategoryNews($news['category_id']);
} 
$liked = false;
if (isset($user['id'])) {
    $user = getNameUser($user['id']);
} else {
    $user = null;
}

switch ($category['name']) {
    case 'Інфо':
        $page = 'info';
        break;
    case 'Події':
        $page = 'events';
        break;
    case 'Оновлення':
        $page = 'updates';
        break;
    default:
        $page = '';
}
?>

<div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
    <div class="topbar">
        <div class="topbar__breadcrumb">
            <a href="/index.php" class="topbar__node">ГОЛОВНА</a>
            <span class="topbar__arraw">&gt;</span>
            <a href="/partials/news/news.php" class="topbar__node nuxt-link-active">НОВИНИ</a>
            <span class="topbar__arraw">&gt;</span>
            <a href="/partials/news/news.php?p=<?php echo $page; ?>" class="topbar__node" style="text-transform:uppercase;"> <?php echo $category['name']; ?></a>
            <span class="topbar__arraw">&gt;</span>

            <span class="topbar__title ellipsis"><?php echo $news['title']; ?></span>
        </div>
        <a href="/partials/news/news.php" class="topbar__back nuxt-link-active">Повернутись до НОВИН</a>
    </div>

    <div class="d-flex">
        <div class="col-lg-8 col-md-12">
            <div class="article__title"><?php echo $news['title']; ?></div>
            <div class="article__date">Пост додано: <?php echo date("d.m.Y H:i:s", strtotime($news['date'])); ?></div>
            <h4 class="m-b-20"></h4>
            <img class="news-preview-image" src="/assets/img/news/<?php echo $news['preview_image']; ?>" alt="">
            <p class="m-t-20 article__text"><?php echo nl2br($news['text']); ?></p>
        </div>
        <div class="col-sm-4 p-l-40 news-latest-sidebar">
            <h4 class="latest__title">Останні новини</h4>

            <?php $lastNewsList = getLastNews(9);

            while ($row = mysqli_fetch_assoc($lastNewsList)) : ?>
                <div>
                    <a href="/partials/news/news_detail.php?id=<?php echo $row['id']; ?>" class="latest__item text-decoration-none">
                        <img src="/assets/img/news/<?php echo $row['preview_image']; ?>" class="coverFit">
                        <div class="latest__info">
                            <p><?php echo $row['title']; ?></p>
                            <p class="latest__date"><?php echo date("M j, Y", strtotime($row['date'])); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

    </div>
</div>


<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>