<?php require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = getCurrentUser();
    $title_discussions = $_POST['title_discussions'];
    $text_discussions = $_POST['text_discussions'];
    $category_discussions = $_POST['category_discussions'];
    $currentDate = time();

    $category = getCategoryDiscussions($category_discussions);
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    if ($user != null) {
        $sql = "INSERT INTO `discussions` (`title_discussions`, `text_discussions`, `author_id`, `category_id`)  VALUES ('$title_discussions', '$text_discussions', '{$user['id']}', '{$category['id_category']}')";
        if (mysqli_query($conn, $sql)) {
            header("Location: /partials/forum/help.php");
        }
    }
    mysqli_close($conn);
}
