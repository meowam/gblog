<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$user = getCurrentUser();

$response = array();

if (isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
    if (isset($user)) {
        $user_id = $user['id'];

        $sql = "SELECT * FROM  posts_saved WHERE user_id = '$user_id' and `post_id` =" . $post_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $sql = "DELETE FROM `posts_saved` WHERE user_id = '$user_id' and `post_id` =" . $post_id;
            $conn->query($sql);
            echo json_encode(['status' => 'disliked']);
        } else {
            $sql = "INSERT INTO posts_saved (user_id, post_id) VALUES ('$user_id', '$post_id')";
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

