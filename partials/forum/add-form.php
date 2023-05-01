<style>
    .modal-header {
        border-bottom: none;
    }
</style>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrap-login100 p-b-30">
                    <form id="form_discussions" class="login100-form validate-form" action="/scripts/add_Disscusion.php" method="POST">
                        <span class="login100-form-title p-b-31">
                            Додати обговорення
                        </span>
                        <div class="mb-3">
                            <label class="form-label">Заголовок</label>
                            <input type="text" name="title_discussions" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Текст</label>
                            <textarea name="text_discussions" class="form-control"></textarea>
                        </div>
                        <label class="form-label">Категорія:</label>
                        <select id="disabledSelect" name="category_discussions" class="form-select">
                            <option>Не вибрано</option>
                            <?php
                            $discussions_categories = getListTable('discussions_categories');
                            while ($row = mysqli_fetch_assoc($discussions_categories)) :
                                echo '<option>' . $row['name_category'] . '</option>';
                            endwhile;
                            ?>
                        </select>
                        <span class="focus-input100"></span>


                        <div class="container-login100-form-btn m-t-57">
                            <button class="login100-form-btn" type="submit" value="submit">
                                Додати
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>