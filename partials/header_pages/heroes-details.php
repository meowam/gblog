<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');

if (isset($_GET['id'])) {
    $heroes_id = $_GET['id'];
    $heroes = getCurrentHeroes($heroes_id);
}

$date = new DateTime($heroes['created']);
?>
<style>
    td {
        border-bottom: 1px solid #CECECE;
        padding: 0 10px;
    }

    tr td:nth-child(1) {
        border-right: 1px solid #CECECE;
        min-width: 160px;
    }

    table {
        border: 1px solid #d3ba91;
    }
</style>
<div class="p-3  m-0 border-0 bd-example bd-example-row" style="padding: 1rem 0rem!important;">
    <div class="elementor-widget-container mb-3">
        <h2 class="elementor-heading-title elementor-size-default">Інформація про персонажа</h2>
    </div>
    <div class="p-t-10">
        <h4 class="p-b-20"><?= $heroes['name']; ?></h4>
        <div class="d-flex div-heroes-info">
            <div class="col-lg-3">
                <img class="heroes-info-img_big" src="/assets/img/heroes/<?= $heroes['photo_big']; ?>" alt="">
            </div>
            <div class="col-lg-9">
                <table class="heroes-info-table">
                    <tr>
                        <td>З’явився в грі:</td>
                        <td><?= $date->format('d.m.Y') ?></td>
                    </tr>
                    <tr>
                        <td>Як отримати:</td>
                        <td><?= $heroes['created_from']; ?></td>
                    </tr>
                    <tr>
                        <td>Рідкість:</td>
                        <td><?php for ($i = 0; $i < $heroes['rarity']; $i++) : ?>
                                <img src="/assets/img/icon/star.png" width="15" height="15">
                            <?php endfor; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Регіон:</td>
                        <td><?= $heroes['region_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Стихія:</td>
                        <td><?= $heroes['element_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Зброя:</td>
                        <td><?= $heroes['weapon_name']; ?></td>
                    </tr>

                    <?php if ($heroes['spec_dish'] != null) : ?>
                        <tr>
                            <td class="td-info">Особлива страва:</td>
                            <td><?= $heroes['spec_dish']; ?></td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>