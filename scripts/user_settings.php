<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require($_SERVER['DOCUMENT_ROOT'] . '/configs/function.php');
$imageName = '';
$user = getCurrentUser();
$username = $_POST['username'];
// $password_old = $_POST['password_old'];
// $password_new = $_POST['password_new'];

$password = md5($_POST['password_old']);
$password_new = md5($_POST['password_new']);

if (!empty($_FILES['image']['name'])) {
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/avatar/';
    $imageName = generateRandomString(64) . time() . "." . pathinfo($_FILES['image']['name'])['extension'];
    $uploadfile = $uploaddir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
    if ($password == $user['password']) {
        $sql = "UPDATE `users` SET `username` = '$username',`password` = '$password_new',`avatar` = '$imageName' WHERE `id` =" . $user['id'];
        mysqli_query($conn, $sql);
        echo json_encode(array('success' => true, 'changePassword' => true,'imageName' => $imageName, 'username' => $username));

    } else {
        $sql = "UPDATE `users` SET `username` = '$username', `avatar` = '$imageName' WHERE `id` =" . $user['id'];
        mysqli_query($conn, $sql);
        echo json_encode(array('success' => true, 'changePassword' => false,'imageName' => $imageName, 'username' => $username));

    }

    if (mysqli_query($conn, $sql)) {
    } else {
        echo json_encode(array('success' => false, 'changePassword' => false,'message' => "Error: " . $sql . "<br>" . mysqli_error($conn)));
    }
    mysqli_close($conn);
} else {
    if ($password == $user['password']) {
        $sql = "UPDATE `users` SET `username` = '$username',`password` = '$password_new' WHERE `id` =" . $user['id'];
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('success' => true,'changePassword' => true, 'username' => $username));
        } else {
            echo json_encode(array('success' => false,'changePassword' => false, 'message' => "Error: " . $sql . "<br>" . mysqli_error($conn)));
        }
    } else {
        $sql = "UPDATE `users` SET `username` = '$username' WHERE `id` =" . $user['id'];
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('success' => true, 'username' => $username));
        } else {
            echo json_encode(array('success' => false, 'message' => "Error: " . $sql . "<br>" . mysqli_error($conn)));
        }
    }
}


