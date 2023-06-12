<?php
require($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
if (!empty($_POST)) {
    $email = mysqli_real_escape_string($conn, $_POST['emailRegister']);
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $response = array('error' => 'Користувач з даним email вже існує');
        echo json_encode($response);
        exit();
    }

    $password = md5($_POST['passwordRegister']);
    $sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('" . $_POST['usernameRegister'] . "', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        $response = array('username' => $_POST['usernameRegister']);
        echo json_encode($response);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}