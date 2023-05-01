<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$news1 = getCurrentNewsWithCategory(1);
$news2 = getCurrentNewsWithCategory(2);
?>

<div class="content">
    <div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
        <div class="row mb-2">
            <!-- <div>
                <div class="elementor-widget-container mb-4 mt-3">
                    <h2 class="elementor-heading-title elementor-size-default">Тір ліст героїв Genshin Impact</h2>
                </div>

                <h6 class="mb-3">В данному тір листі зібрані усі герої Genshin Impact:</h6>
                <ul class="tier-list-ul">
                    <li class="mb-1"><img style="height:40px;width:30px;" src="/assets/img/mark.png">&nbsp;&nbsp;<b>S</b> — надсильний герой</li>
                    <li class="mb-1"><img style="height:40px;width:30px;" src="/assets/img/mark.png">&nbsp;&nbsp;<b>A</b> — ідеально збалансований</li>
                    <li class="mb-1"><img style="height:40px;width:30px;" src="/assets/img/mark.png">&nbsp;&nbsp;<b>B</b> — трохи слабкий. Звичайний герой з певними слабкостями, але все ж придатний для використання</li>
                    <li class="mb-1"><img style="height:40px;width:30px;" src="/assets/img/mark.png">&nbsp;&nbsp;<b>C</b> — слабкий герой. Уникайте використання, якщо можливо</li>
                    <li class="mb-1"><img style="height:40px;width:30px;" src="/assets/img/mark.png">&nbsp;&nbsp;<b>D</b> — дуже слабкий герой. Не використовувати</li>
                </ul>
                <h6 class="float-r mb-5"><i> оновлено 23 лютого 2023 року</i></h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ранг</th>
                            <th style="text-align:center">Герої</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="tier-list__td" style="background-color:rgb(255, 127, 127);">S</td>
                             <td><img src="/assets/img/rangS.png" alt=""></td> 
                        </tr>
                        <tr>
                            <td class="tier-list__td" style="background-color: rgb(255, 191, 127);">A</td>
                            <td><img src="/assets/img/rangA.png" alt=""></td> 
                        </tr>
                        <tr>
                            <td class="tier-list__td" style="background-color: rgb(255, 255, 127);">В</td>
                             <td><img src="/assets/img/rangB.png" alt=""></td> 
                        </tr>
                        <tr>
                            <td class="tier-list__td" style="background-color: rgb(191, 255, 127);">С</td>
                             <td><img src="/assets/img/rangC.png" alt=""></td> 
                        </tr>

                        <tr>
                            <td class="tier-list__td" style="background-color: rgb(127, 255, 127);">D</td>
                             <td><img src="/assets/img/rangD.png" alt=""></td> 
                        </tr>
                    </tbody>
                </table>
            </div> -->
            <div class="elementor-widget-container mb-3 mt-2">
                <h2 class="elementor-heading-title elementor-size-default">Останні новини та оновлення</h2>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-2 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-3 text-success"><?= $news1['name']; ?></strong>
                        <h4 class="mb-3 overflow-hidden" style="max-height: 27px;"><?= $news1['title']; ?></h3>
                            <p class="card-text mb-auto overflow-hidden" style="max-height: 90px;text-align:justify"><?= $news1['text']; ?></p>
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
                            <p class="card-text mb-auto overflow-hidden" style="max-height: 90px;text-align:justify"><?= $news2['text']; ?></p>
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
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/beidou-futured.jpg);background-size: cover;background-position-y:-10px;background-position-x:center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;">Beidou Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <a>Персонажі</a>
                                <a>Гіди</a>
                            </div>
                            <div class="hide-sm">
                                <span> 9 хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <h2>Beidou Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h2>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc">Грудень 25, 2022</time>
                                    <time class="entry-date entry-date-m"> 25.12.2022</time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a>0 Коментарів</a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author">Ethers</a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/xiao-futured1.jpg);background-size:cover;background-position: center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;">Xiao Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <a>Персонажі</a>
                                <a>Гіди</a>
                            </div>
                            <div class="hide-sm">
                                <span> 9 хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <h2>Xiao Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h2>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc">Грудень 25, 2022</time>
                                    <time class="entry-date entry-date-m"> 25.12.2022</time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a>0 Коментарів</a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author">Ethers</a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/heroes-all-futured.jpg);background-size: cover;background-position-y: -51px;background-position-x:center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;">Абсолютний посібник для початківців (все, що вам потрібно знати)</h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <a>Персонажі</a>
                                <a>Гіди</a>
                            </div>
                            <div class="hide-sm">
                                <span> 12 хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <h2>Абсолютний посібник для початківців (все, що вам потрібно знати)</h2>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc">Грудень 25, 2022</time>
                                    <time class="entry-date entry-date-m"> 25.12.2022</time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a>0 Коментарів</a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author">Ethers</a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/arataki-itto-feature.webp);background-size: cover;background-position: center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;">Arataki Itto Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <a>Персонажі</a>
                                <a>Персонажі</a>
                                <a>Персонажі</a>
                                <a>Персонажі</a>
                                <a>Персонажі</a>
                                <a>Гіди</a>
                            </div>
                            <div class="hide-sm">
                                <span> 9 хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <h2 class="bot-article-meta-h2">Arataki Itto Гід: Найкращий білд, артефакти, зброя, команди та багато іншого та багато іншого та багато іншого та багато іншого та багато іншого та багато іншого та багато іншого</h2>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc">Грудень 25, 2022</time>
                                    <time class="entry-date entry-date-m"> 25.12.2022</time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a> 0 Коментарів</a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author">Ethers</a>
                                </span>
                            </span>
                            <span class="readmore">
                                <a rel="post"> Читати <i class="fas fa-long-arrow-alt-right post-meta-icon readmore"></i></a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <div class="view view-first">
                    <img style='background-image: url(/assets/img/lisa-futured.jpg);background-size: cover;background-position:center;' />
                    <div class="view-before">
                        <h4 class="overflow-hidden" style="max-height:28px;">Lisa Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h4>
                    </div>
                    <div class="mask">
                        <div class="top-article-meta">
                            <div class="cat-list">
                                <a>Персонажі</a>
                                <a>Гіди</a>
                            </div>
                            <div class="hide-sm">
                                <span> 9 хв читати</span>
                            </div>
                        </div>
                        <div class="bot-article-meta">
                            <h2>Lisa Гід: Найкращий білд, артефакти, зброя, команди та багато іншого</h2>
                        </div>
                        <div class="entry-meta">
                            <span class="entry-date">
                                <i class="far fa-clock post-meta-icon"></i>
                                <a rel="bookmark">
                                    <time class="entry-date entry-date-pc">Грудень 25, 2022</time>
                                    <time class="entry-date entry-date-m"> 25.12.2022</time>
                                </a>
                            </span>
                            <span class="comment-link">
                                <i class="far fa-comment-alt post-meta-icon"></i>
                                <a>0 Коментарів</a>
                            </span>
                            <span class="byline">
                                <span class="author vcard">
                                    <i class="far fa-user post-meta-icon"></i>
                                    <a class="url fn n post-author" rel="author">Ethers</a>
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