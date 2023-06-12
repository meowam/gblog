<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
?>
<style>
    td {
        height: auto;
        text-align: center;
        vertical-align: middle;
        width: 50px;
        height: 85px;
    }

    .headerContainer {
        display: flex;
    }

    #addCard {
        background: none;
        border: none;
        font-size: 40px;
    }

    .rows {
        display: flex;
        width: 100%;
        height: 95px;
        background-color: #FAF3E7;
    }

    .label {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 9%;
        min-width: 50px;
        max-width: 90px;
    }

    .card_heroes {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 95px;
        width: 100px;
        background-color: white;
    }

    #bank {
        display: flex;
        flex-wrap: wrap;
        min-height: 97px;
        background-color: #FAF3E7;
        border: 1px solid #DECBAC;
    }

    h1 {
        line-height: 46px;
    }

</style>
<div>
    <div class="elementor-widget-container mb-4 mt-3">
        <h2 class="elementor-heading-title elementor-size-default">Тір ліст героїв Genshin Impact</h2>
    </div>
    <span class="headerContainer" style="display: none;">
        <button id="addCard">+</button>
    </span>
    <table class="table m-t-35 " id="board">
        <thead>
            <tr>
                <th class="d-flex" style="padding: 0.5rem 0;">
                    <div style="width: 9%; text-align: center; min-width: 50px; max-width: 90px;">
                        Ранг
                    </div>
                    <div style="text-align: center; width: 91%;">
                        Герої
                    </div>
                </th>
            </tr>
        </thead>

        <tbody>
            <tr class="rows">
                <td class="label" style="background-color:rgb(255, 127, 127);">S</td>
            </tr>
            <tr class="rows">
                <td class="label" style="background-color: rgb(255, 191, 127);">A</td>
            </tr>
            <tr class="rows">
                <td class="label" style="background-color: rgb(255, 255, 127);">В</td>
            </tr>
            <tr class="rows">
                <td class="label" style="background-color: rgb(191, 255, 127);">С</td>
            </tr>

            <tr class="rows">
                <td class="label" style="background-color: rgb(127, 255, 127);">D</td>
            </tr>
        </tbody>
    </table>

    <h2 class="m-t-30 m-b-15">Список героїв</h2>
    <div id="bank" class="m-b-30">
        <?php $heroes = getHeroes();
        while ($row = mysqli_fetch_assoc($heroes)) : ?>
            <div class="card_heroes" draggable="true" id="<?= date('H:i:s').$row['id_heroes']; ?>" onclick="deleteCard(event);"><img width="100" height="95" src="/assets/img/heroes/<?= $row['photo_small'];?>" style="pointer-events: none;"> </div>
        <?php endwhile; ?>
    </div>
    <script src="/assets/js/cards.js"></script>
    <script src="/assets/js/rows.js"></script>
    <script src="/assets/js/bank.js"></script>
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
    ?>