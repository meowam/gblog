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
        die('Помилка підключення: ' . mysqli_connect_error());
    }
    if ($user != null) {
        $sql = "INSERT INTO `discussions` (`title_discussions`, `text_discussions`, `author_id`, `category_id`)  VALUES ('$title_discussions', '$text_discussions', '{$user['id']}', '{$category['id_category']}')";
        if (mysqli_query($conn, $sql)) {
            $response = array(
                'status' => 'success',
                'message' => 'Обговорення успішно додано!'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Не вдалося додати обговорення!'
            );
        }
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Щоб додати обговорення, будь ласка, авторизуйтесь!'
        );
    }

    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
