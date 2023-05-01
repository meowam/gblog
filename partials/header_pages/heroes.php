<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
?>

<div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
    <div class="elementor-widget-container mb-3 ">
        <h2 class="elementor-heading-title elementor-size-default">Список персонажів Genshin Impact</h2>
    </div>
    <div class="table-responsive d-flex flex-column">

        <button class="btn btn-outline-primary m-b-20 create-tierlist" style="font-size: 18px;"><span>+</span> Створити власний тірліст</button>

        <table class="article-table sortable jquery-tablesorter table__GI">
            <thead>
                <tr>
                    <th class="headerSort" tabindex="0" role="columnheader button" title="Сортувати за зростанням">Іконка
                    </th>
                    <th class="headerSort" tabindex="0" role="columnheader button" title="Сортувати за зростанням">Ім'я
                    </th>
                    <th class="headerSort" tabindex="0" role="columnheader button" title="Сортувати за зростанням">Рідкість
                    </th>
                    <th class="headerSort" tabindex="0" role="columnheader button" title="Сортувати за зростанням">Стихія
                    </th>
                    <th class="headerSort" tabindex="0" role="columnheader button" title="Сортувати за зростанням">Зброя
                    </th>
                    <th class="headerSort" tabindex="0" role="columnheader button" title="Сортувати за зростанням">Регіон
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $heroes = getHeroes();
                while ($row = mysqli_fetch_assoc($heroes)) :
                ?>
                    <tr>
                        <td class="lh-55">
                            <a href="/partials/header_pages/heroes-details.php?id=<?= $row['id_heroes']; ?>">
                                <img src="/assets/img/heroes/<?php echo $row['photo_small']; ?>" width="70" height="70">
                            </a>
                        </td>
                        <td><a href="/partials/header_pages/heroes-details.php?id=<?= $row['id_heroes']; ?>"><?php echo $row['name']; ?></a>
                        </td>
                        <td style="min-width: 115px;">
                            <?php for ($i = 0; $i < $row['rarity']; $i++) : ?>
                                <img src="/assets/img/icon/star.png" width="15" height="15">
                            <?php endfor; ?>
                        </td>
                        <td><span style="white-space:nowrap;">
                                <a>
                                    <img src="/assets/img/elements/<?php echo $row['element_img']; ?>" width="20" height="20">
                                </a>
                                <a><?= $row['element_name']; ?></a>
                            </span>
                        </td>
                        <td><span style="white-space:nowrap;">
                                <a>
                                    <img src="/assets/img/weapons/<?php echo $row['weapon_img']; ?>" width="20" height="20"></a>
                                <a><?= $row['weapon_name']; ?></a>
                            </span>
                        </td>
                        <td><a><?= $row['region_name']; ?></a>
                        </td>
                    </tr>
                <?php endwhile; ?>


            </tbody>

        </table>

    </div>
</div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>