<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($user)) {

        $title = $_POST['title'];
        $text = $_POST['editor'];
        $categories = $_POST['categories'];
        $image = $_FILES['image']['name'];

        $user_id = $user['id'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Загружаем файл картинки
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] .'/assets/img/posts/'. $image);
        } else {
            $image = "default.jpg";
        }

        $title = mysqli_real_escape_string($conn, $title);
        $text = mysqli_real_escape_string($conn, $text);

        $sql = "INSERT INTO `posts` (`post_image`, `title`, `text`, `author_id`) VALUES ('$image', '$title', '$text', '$user_id')";
        mysqli_query($conn, $sql);

        $post_id = mysqli_insert_id($conn);
        $UniqueArray = array_unique($categories);
        foreach ($UniqueArray as $category) {
            $sql = "SELECT * from categories where `name_category` = '$category'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)){
                $id = $row['id_category'];
                $sql2 = "INSERT INTO posts_categories (post_id, category_id) VALUES ('$post_id', '$id')";   
            }
            mysqli_query($conn, $sql2);
        }
    } else {
        echo 'no login';
    }
} else {
    echo 'error';
}
