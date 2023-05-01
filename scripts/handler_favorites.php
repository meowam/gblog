<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();

$response = array();

if (isset($_POST['news_id'])) {
    $news_id = $_POST['news_id'];
    if (isset($user)) {
        $user_id = $user['id'];

        $sql = "SELECT * FROM  news_liked WHERE user_id = '$user_id' and `news_id` =" . $news_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sql = "DELETE FROM `news_liked` WHERE user_id = '$user_id' and `news_id` =" . $news_id;
            $conn->query($sql);
            echo json_encode(['status' => 'disliked']);
        } else {
            $sql = "INSERT INTO news_liked (user_id, news_id) VALUES ('$user_id', '$news_id')";
            if ($result = $conn->query($sql)) {
                echo json_encode(['status' => 'liked']);
            }
        }
    } else {
        echo 'no login';
    }
} else {
    echo 'error';
}

