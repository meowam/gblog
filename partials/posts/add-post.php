<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
$maxCategories = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM categories"));
?>
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>
<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 200px;
    }

    .ck-content .image {
        max-width: 80%;
        margin: 20px auto;
    }
</style>
<div class="p-3  m-0 border-0 bd-example bd-example-row">
    <div class="elementor-widget-container mb-3 ">
        <h2 class="elementor-heading-title elementor-size-default">Створення нового поста</h2>
    </div>
    <form action="#" method="POST" id="AddPost" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Заголовок</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Текст</label>
            <div id="editor" class="form-control" name="editor"></div>
        </div>
        <div class="mb-3" id="categories">
            <div class="d-flex justify-content-between align-items-center">
                <label for="disabledSelect" class="form-label">Категорії: </label>
                <div><button class="btn btn-outline-success" id="add-category">Додати</button>
                    <button class="btn btn-outline-danger" id="delete-category">Видалити</button>
                </div>
            </div>

            <div id="categories1" class="mb-3">
                <label class="form-label">Категорія 1</label>
                <select id="disabledSelect" class="form-select" name="categories[]">
                    <option>Не вибрано</option>
                    <?php
                    $categories = getListTable('categories');
                    while ($row = mysqli_fetch_assoc($categories)) :
                        echo '<option>' . $row['name_category'] . '</option>';
                    endwhile;
                    ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Картинка посту</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" value="submit" class="btn btn-outline-primary">Створити</button>
    </form>
</div>

<script>
    var myClassicEditor;

    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'removeFormat', '|',
                    'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',

                    'alignment', '|',
                    'link',
                    // 'insertImage',
                    'blockQuote',
                    // 'insertTable', 
                    'horizontalLine', '|',
                    // 'sourceEditing', 
                    'undo', 'redo',
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Параграф',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Заголовок 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Заголовок 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Заголовок 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Заголовок 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Заголовок 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Заголовок 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },

            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },

            removePlugins: [
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents'
            ]
        })
        .then(editor => {
            myClassicEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
?>
<script>
    $('#AddPost').submit(function(event) {
        event.preventDefault();

        var data = myClassicEditor.getData();
        var formData = new FormData(this);
        formData.append('editor', data);
        $.ajax({
            url: '/scripts/handler_posts.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = '/partials/guides/guides.php';
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
</script>